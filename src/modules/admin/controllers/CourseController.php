<?php
namespace app\modules\admin\controllers;
use app\models\MdlCourses;
use yii\web\UploadedFile;
use yii\helpers\Url;
use app\models\MdlCourseVideoCollections;
use app\modules\admin\helpers\WebController;
use app\models\MdlCourseVideos;
use app\models\MdlCourseBookLinks;
use app\models\MdlCourseBookAttachments;
use app\helpers\JxDictionary;
use app\modules\admin\helpers\UploadFileHandler;
use app\models\MdlAdminUsers;
use app\models\MdlCoursePurchaseTokens;
use yii\web\HttpException;
use app\models\MdlCourseTests;
use app\models\MdlCourseTestQuestions;
/**
 * Default controller for the `admin` module
 */
class CourseController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * @var boolean
     */
    public $enableCsrfValidation = false;
    
    /**
     * 课程列表
     * @return string
     */
    public function actionIndex() {
        $this->activeMenuItem('course');
        $courses = MdlCourses::find()
            ->where(['<>','status', JxDictionary::value('COURSE_STATUS', 'DELETED')])
            ->orderBy(['id'=>SORT_DESC])
            ->all();
        return $this->render('index',['list'=>$courses]);
    }
    
    /**
     * 课程编辑
     * @param int $id 课程ID
     * @return string
     */
    public function actionEdit( $id=null ) {
        $this->activeMenuItem('course');
        
        $course = new MdlCourses();
        if ( !empty($id) ) {
            $course = MdlCourses::findOne($id);
        }
        if ( null === $course ) {
            return $this->render404();
        }
        if ( $this->flashExists('course') ) {
            $course->setAttributes($this->flashGet('course'));
        }
        
        $teachers = MdlAdminUsers::findAll(['type'=>JxDictionary::value('ADMIN_USER_TYPE', 'TEACHER')]);
        return $this->render('edit',[
            'course'=>$course,
            'teachers' => $teachers,
        ]);
    }
    
    /**
     * 课程保存
     * @return string
     */
    public function actionSave() {
        $form = $this->request->post('form');
        
        $course = new MdlCourses();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $course = MdlCourses::findOne($id);
        }
        if ( null === $course ) {
            return $this->render404();
        }
        $course->setAttributes($form);
        if ( !$course->save() ) {
            $this->flashSetByArray(['course'=>$course->toArray(), 'error'=>$course->getErrorSummary(true)]);
            return $this->redirect(['course/edit','id'=>$course->id]);
        }
        
        $file = UploadedFile::getInstanceByName('thumbnail');
        if ( null !== $file && !$file->hasError ) {
            $file->saveAs(\Yii::$app->basePath.'/web/uploads/courses/thumbnails/'.$course->id.'-'.time());
            $course->thumbnail_url = Url::to('uploads/courses/thumbnails/'.$course->id.'-'.time(), true);
        } else if ( 0 === strlen($course->thumbnail_url) ) {
            $course->thumbnail_url = Url::to('img/course-default-thumbnail.png');
        }
        $course->save();
        
        $this->redirect(['course/index']);
    }
    
    /**
     * 删除课程
     * @param int $course
     * @return \yii\web\Response
     */
    public function actionDelete( $course ) {
        $course = MdlCourses::findOne(['id'=>$course]);
        if ( null !== $course ) {
            $course->delete();
        }
        return $this->redirect(['course/index']);
    }
    
    /**
     * 课程状态变更
     * @return \yii\web\Response
     */
    public function actionStatusChange() {
        $id = $this->request->post('msc-id');
        $status = $this->request->post('msc-status');
        
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            return $this->render404();
        }
        $course->status = $status;
        if ( JxDictionary::match('COURSE_STATUS', 'ONSELL', $course->status) ) {
            $course->published_at = date('Y-m-d H:i:s');
        } else {
            $course->published_at = null;
        }
        $course->save();
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 视频合集列表
     * @param int $course
     * @return string
     */
    public function actionVideoCollectionIndex( $course ) {
        $this->activeMenuItem('course');
        
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            return $this->render404();
        }
        $collections = MdlCourseVideoCollections::findAll(['course_id'=>$course->id]);
        return $this->render('video-collection-index',['course'=>$course,'collections'=>$collections]);
    }
    
    /**
     * 视频合集列表
     * @param int $course
     * @param int $id
     * @return string
     */
    public function actionVideoCollectionEdit($course, $id=null) {
        $this->activeMenuItem('course');
        
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            return $this->render404();
        }
        
        $collection = new MdlCourseVideoCollections();
        if ( null !== $id ) {
            $collection = MdlCourseVideoCollections::findOne($id);
        }
        if ( null === $collection ) {
            return $this->trigger404();
        }
        if ( $this->flashExists('collection') ) {
            $collection->setAttributes($this->flashGet('collection'));
        }
        $collection->course_id = $course->id;
        return $this->render('video-collection-edit',['collection'=>$collection]);
    }
    
    /**
     * 视频合集保存
     * @return string
     */
    public function actionVideoCollectionSave() {
        $collection = new MdlCourseVideoCollections();
        $collection->thumbnail_url = Url::to('img/video-default-thumbnail.png');
        
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $collection = MdlCourseVideoCollections::findOne($id);
        }
        if ( null === $collection ) {
            return $this->trigger404();
        }
        $collection->setAttributes($this->request->post('form'));
        $file = UploadFileHandler::handle('thumbnail')
            ->setAllowedExtensions(['png','jpg'])
            ->validate();
        if ( $file->hasError() ) {
            return $this->goBackWithError($file->errors);
        }
        if ( !$collection->save() ) {
            $this->flashSetByArray(['collection'=>$collection->toArray(), 'error'=>$collection->getErrorSummary(true)]);
            return $this->redirect(['course/video-collection-edit','id'=>$collection->id,'course'=>$collection->course_id]);
        }
        if ( $file->hasFile() ) {
            $file->setSavePath('courses/video-collections/thumbnails/'.$collection->id.'-'.time());
            $collection->thumbnail_url = $file->saveAndGetDownloadUrl();
        }
        $collection->save();
        $this->redirect(['course/video-collection-index','course'=>$collection->course_id]);
    }
    
    /**
     * 视频合集删除
     * @param int $id
     * @return string
     */
    public function actionVideoCollectionDelete($id) {
        $collection = MdlCourseVideoCollections::findOne($id);
        if ( null !== $collection ) {
            $collection->delete();
        }
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 视频列表
     * @param int $collection
     * @return string
     */
    public function actionVideoIndex( $collection ) {
        $this->activeMenuItem('course');
        $collection = MdlCourseVideoCollections::findOne($collection);
        if ( null === $collection ) {
            return $this->render404();
        }
        $course = MdlCourses::findOne($collection->course_id);
        if ( null === $course ) {
            return $this->render404();
        }
        $videos = MdlCourseVideos::find()
            ->where(['collection_id'=>$collection->id])
            ->orderBy(['index'=>SORT_ASC])
            ->all();
        return $this->render('video-index',['videos'=>$videos,'collection'=>$collection,'course'=>$course]);
    }
    
    /**
     * 视频上传
     * @param int $collection
     * @param int $id
     * @return string
     */
    public function actionVideoEdit( $collection, $id=null ) {
        $this->activeMenuItem('course');
        $video = new MdlCourseVideos();
        $video->index = MdlCourseVideos::find()->where(['collection_id'=>$collection])->count()+1;
        if ( !empty($id) ) {
            $video = MdlCourseVideos::findOne($id);
        }
        if ( null === $video ) {
            return $this->render404();
        }
        $video->collection_id = $collection;
        
        $collection = MdlCourseVideoCollections::findOne($collection);
        if ( null === $collection ) {
            return $this->render404();
        }
        return $this->render('video-edit',['video'=>$video,'collection'=>$collection]);
    }
    
    /**
     * 视频保存
     * @return string
     */
    public function actionVideoSave() {
        $video = new MdlCourseVideos();
        $id = $this->request->post('id');
        if ( !empty($id) ) {
            $video = MdlCourseVideos::findOne($id);
        }
        if ( null === $video ) {
            return $this->render404();
        }
        $video->setAttributes($this->request->post('form'));
        if ( !$video->save() ) {
            $this->flashSetByArray(['video'=>$video->toArray(),'error'=>$video->getErrorSummary(true)]);
            return $this->redirect(['course/video-edit','collection'=>$video->collection_id,'id'=>$video->id]);
        }
        $this->redirect(['course/video-index','collection'=>$video->collection_id]);
    }
    
    /**
     * 视频删除
     * @param int $id
     * @return string
     */
    public function actionVideoDelete( $id ) {
        $video = MdlCourseVideos::findOne($id);
        if ( null !== $video ) {
            $video->delete();
        }
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 教材购买链接列表
     * @param int $course
     * @return string
     */
    public function actionBookLinkIndex( $course ) {
        $this->activeMenuItem('course');
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            return $this->render404();
        }
        $links = MdlCourseBookLinks::findAll(['course_id'=>$course]);
        if ( null === $links ) {
            return $this->render404();
        }
        return $this->render('book-link-index', ['links'=>$links,'course'=>$course]);
    }
    
    /**
     * 教材购买链接编辑
     * @param int $id
     * @return string
     */
    public function actionBookLinkEdit( $course, $id=null ) {
        $this->activeMenuItem('course');
        $link = new MdlCourseBookLinks();
        $link->course_id = $course;
        if ( !empty($id) ) {
            $link = MdlCourseBookLinks::findOne($id);
        }
        if ( null === $link ) {
            return $this->render404();
        }
        if ( $this->flashExists('link') ) {
            $link->setAttributes($this->flashGet('link'));
        }
        return $this->render('book-link-edit',['link'=>$link]);
    }
    
    /**
     * 教材购买链接保存
     * @return string
     */
    public function actionBookLinkSave () {
        $link = new MdlCourseBookLinks();
        $id = $this->request->post('id');
        if ( !empty($id) ) {
            $link = MdlCourseBookLinks::findOne($id);
        }
        if ( null === $link ) {
            return $this->render404();
        }
        
        $link->setAttributes($this->request->post('form'));
        if ( !$link->save() ) {
            $this->flashSetByArray(['link' => $link->toArray(), 'error'=>$link->getErrorSummary(true)]);
            return $this->redirect(['course/book-link-edit','course'=>$link->course_id,'id'=>$link->id]);
        }
        return $this->redirect(['course/book-link-index','course'=>$link->course_id]);
    }
    
    /**
     * 课程链接删除
     * @param int $id
     * @return string
     */
    public function actionBookLinkDelete( $id ) {
        $link = MdlCourseBookLinks::findOne($id);
        if ( null !== $link ) {
            $link->delete();
        }
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 教材在线版本编辑
     * @param int $course
     */
    public function actionBookOnlineEdit( $course ) {
        $this->activeMenuItem('course');
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            return $this->render404();
        }
        return $this->render('book-online-edit',['course'=>$course]);
    }
    
    /**
     * 教材在线版本保存
     * @return \yii\web\Response
     */
    public function actionBookOnlineUpload( ) {
        $id = $this->request->post('id');
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            return $this->render404();
        }
        
        $file = UploadFileHandler::setup($this->module->params['uploads']['course-book-online']);
        if ( $file->validate()->hasError() ) {
            $this->flashSet('error', $file->errors);
            return $this->redirect($this->request->referrer);
        }
        
        $course->online_book_url = $file->saveAndGetDownloadUrl();
        $course->save();
        return $this->redirect(['course/index']);
    }
    
    /**
     * 教材附件列表
     * @param int $course
     * @return string
     */
    public function actionBookAttachIndex( $course ) {
        $this->activeMenuItem('course');
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            return $this->render404();
        }
        $attachments = MdlCourseBookAttachments::findAll(['course_id'=>$course]);
        return $this->render('book-attach-index', ['attachments'=>$attachments,'course'=>$course]);
    }
    
    /**
     * 教材附件编辑
     * @param int $course
     * @param int $id
     * @return string
     */
    public function actionBookAttachEdit( $course, $id=null ) {
        $this->activeMenuItem('course');
        $attachment = new MdlCourseBookAttachments();
        $attachment->course_id = $course;
        if ( !empty($id) ) {
            $attachment = MdlCourseBookAttachments::findOne($id);
        }
        if ( null === $attachment ) {
            return $this->render404();
        }
        if ( $this->flashExists('attachment') ) {
            $attachment->setAttributes($this->flashGet('attachment'));
        }
        return $this->render('book-attach-edit', ['attachment'=>$attachment]);
    }
    
    /**
     * 教材附件保存
     * @return \yii\web\Response
     */
    public function actionBookAttachSave() {
        $attachment = new MdlCourseBookAttachments();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $attachment = MdlCourseBookAttachments::findOne($id);
        }
        if ( null === $attachment ) {
            return $this->render404();
        }
        $attachment->setAttributes($this->request->post('form'));
        if ( !$attachment->save() ) {
            $this->flashSetByArray(['attachment'=>$attachment->toArray(),'error'=>$attachment->getErrorSummary(true)]);
            return $this->redirect($this->request->referrer);
        }
        $this->redirect(['course/book-attach-index','course'=>$attachment->course_id]);
    }
    
    /**
     * 课程附件删除
     * @param int $id
     * @return string
     */
    public function actionBookAttachDelete( $id ) {
        $attachment = MdlCourseBookAttachments::findOne($id);
        if ( null !== $attachment ) {
            $attachment->delete();
        }
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 课程密钥列表
     * @param int $course
     * @return string
     */
    public function actionTokenIndex( $course ) {
        $this->activeMenuItem('course');
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        $tokens = MdlCoursePurchaseTokens::findAll(['course_id' => $course->id]);
        return $this->render('token-index', ['tokens'=>$tokens,'course'=>$course]);
    }
    
    /**
     * 课程密钥生成
     * @param int $course
     * @return string
     */
    public function actionTokenGenerate( $course ) {
        $token = new MdlCoursePurchaseTokens();
        $token->admin_id = \Yii::$app->user->id;
        $token->course_id = $course;
        $token->status = JxDictionary::value('COURSE_TOKEN_STATUS', 'NEW');
        $token->token = md5(sprintf('%s-%s-%s-%s', $token->admin_id, $token->course_id, microtime(), uniqid()));
        $token->save();
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 试卷列表
     * @param unknown $course
     * @return string
     */
    public function actionTestIndex( $course ) {
        $this->activeMenuItem('course');
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        $tests = MdlCourseTests::findAll(['course_id' => $course->id]);
        return $this->render('test-index',['tests'=>$tests, 'course'=>$course]);
    }
    
    /**
     * 编辑试卷
     * @param unknown $course
     * @param unknown $id
     */
    public function actionTestEdit( $course, $id=null ) {
        $this->activeMenuItem('course');
        
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $test = new MdlCourseTests();
        $test->course_id = $course->id;
        if ( null !== $id ) {
            $test = MdlCourseTests::findOne($id);
        }
        return $this->render('test-edit',['test'=>$test, 'course'=>$course]);
    }
    
    /**
     * 保存试卷
     * @return string
     */
    public function actionTestSave() {
        $test = new MdlCourseTests();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $test = MdlCourseTests::findOne($id);
        }
        if ( null === $test ) {
            return $this->render404();
        }
        $test->setAttributes($this->request->post('form'));
        if ( !$test->save() ) {
            $this->flashSetByArray(['test'=>$test->toArray(),'error'=>$test->getErrorSummary(true)]);
            return $this->redirect($this->request->referrer);
        }
        $this->redirect(['course/test-index','course'=>$test->course_id]);
    }
    
    /**
     * 试卷删除
     * @param int $id
     * @return string
     */
    public function actionTestDelete( $id ) {
        $test = MdlCourseTests::findOne($id);
        if ( null !== $test ) {
            $test->delete();
        }
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 试题列表
     * @param unknown $test
     * @return string   
     */
    public function actionTestQuestionIndex( $test ) {
        $this->activeMenuItem('course');
        $test = MdlCourseTests::findOne($test);
        if ( null === $test ) {
            throw new HttpException(404);
        }
        
        $course = MdlCourses::findOne($test->course_id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $questions = MdlCourseTestQuestions::find()->where(['test_id'=>$test->id])->orderBy(['index'=>SORT_ASC])->all();
        return $this->render('test-question-index', [
            'test'=>$test,
            'questions'=>$questions,
            'course'=>$course
        ]);
    }
    
    /**
     * 试题编辑
     * @return string
     */
    public function actionTestQuestionEdit( $test, $id=null ) {
        $this->activeMenuItem('course');
        $test = MdlCourseTests::findOne($test);
        if ( null === $test ) {
            throw new HttpException(404);
        }
        
        $course = MdlCourses::findOne($test->course_id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $question = new MdlCourseTestQuestions();
        $question->index = $test->questionCount + 1;
        $question->options = '[]';
        if ( null !== $id ) {
            $question = MdlCourseTestQuestions::findOne($id);
        }
        if ( null === $question ) {
            throw new HttpException(404);
        }
        return $this->render('test-question-edit',[
            'test'=>$test,
            'course'=>$course,
            'question'=>$question,
        ]);
    }
    
    /**
     * 试题保存
     * @return string
     */
    public function actionTestQuestionSave() {
        $question = new MdlCourseTestQuestions();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $question = MdlCourseTestQuestions::findOne($id);
        }
        if ( null === $question ) {
            return $this->render404();
        }
        
        $options = array();
        foreach ( $this->request->post('options') as $item ) {
            $options[$item['key']] = $item['value'];
        }
        $question->options = json_encode($options);
        $question->setAttributes($this->request->post('form'));
        if ( !$question->save() ) {
            $this->flashSetByArray(['question'=>$question->toArray(),'error'=>$question->getErrorSummary(true)]);
            return $this->redirect($this->request->referrer);
        }
        $this->redirect(['course/test-question-index','test'=>$question->test_id]);
    }
    
    /**
     * 试题删除
     * @param int $id
     * @return string
     */
    public function actionTestQuestionDelete( $id ) {
        $question = MdlCourseTestQuestions::findOne($id);
        if ( null !== $question ) {
            $question->delete();
        }
        return $this->redirect($this->request->referrer);
    }
}
