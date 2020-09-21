<?php
namespace app\modules\admin\controllers;
use app\models\MdlCourses;
use yii\web\UploadedFile;
use yii\helpers\Url;
use app\models\MdlCourseVideoCollections;
use app\modules\admin\helpers\WebController;
use app\models\MdlCourseVideos;
/**
 * Default controller for the `admin` module
 */
class CourseController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    public $enableCsrfValidation=false;
    
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        $courses = MdlCourses::find()->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('index',['list'=>$courses]);
    }
    
    /**
     * @return string
     */
    public function actionEdit( $id=null ) {
        $course = new MdlCourses();
        if ( !empty($id) ) {
            $course = MdlCourses::findOne($id);
        }
        if ( null === $course ) {
            return $this->trigger404();
        }
        if ( \Yii::$app->getSession()->hasFlash('course') ) {
            $course->setAttributes(\Yii::$app->getSession()->getFlash('course',null,true));
        }
        return $this->render('edit',['course'=>$course]);
    }
    
    /**
     * @return string
     */
    public function actionSave() {
        $form = \Yii::$app->getRequest()->post('form');
        
        $course = new MdlCourses();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $course = MdlCourses::findOne($id);
        }
        if ( null === $course ) {
            return $this->trigger404();
        }
        $course->setAttributes($form);
        if ( !$course->save() ) {
            \Yii::$app->getSession()->setFlash('course', $course->toArray());
            \Yii::$app->getSession()->setFlash('error', $course->getErrorSummary(true));
            return $this->redirect(['course/edit','id'=>$course->id]);
        }
        
        $file = UploadedFile::getInstanceByName('thumbnail');
        if ( null !== $file && !$file->hasError ) {
            $file->saveAs(\Yii::$app->basePath.'/web/uploads/courses/thumbnails/'.$course->id.'-'.time());
            $course->thumbnail_url = Url::to('uploads/courses/thumbnails/'.$course->id.'-'.time(), true);
            $course->save();
        }
        
        $this->redirect(['course/index']);
    }
    
    /**
     * 
     */
    public function actionVideoCollectionIndex( $course ) {
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            return $this->trigger404();
        }
        $collections = MdlCourseVideoCollections::findAll(['course_id'=>$course->id]);
        return $this->render('video-collection-index',['course'=>$course,'collections'=>$collections]);
    }
    
    /**
     *
     */
    public function actionVideoCollectionEdit($course, $id=null) {
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            return $this->trigger404();
        }
        
        $collection = new MdlCourseVideoCollections();
        if ( null !== $id ) {
            $collection = MdlCourseVideoCollections::findOne($id);
        }
        if ( null === $collection ) {
            return $this->trigger404();
        }
        if ( \Yii::$app->getSession()->hasFlash('collection') ) {
            $collection->setAttributes(\Yii::$app->getSession()->getFlash('collection',null,true));
        }
        $collection->course_id = $course->id;
        return $this->render('video-collection-edit',['collection'=>$collection]);
    }
    
    /**
     *
     */
    public function actionVideoCollectionSave() {
        $form = \Yii::$app->getRequest()->post('form');
        
        $collection = new MdlCourseVideoCollections();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $collection = MdlCourseVideoCollections::findOne($id);
        }
        if ( null === $collection ) {
            return $this->trigger404();
        }
        $collection->setAttributes($form);
        if ( !$collection->save() ) {
            \Yii::$app->getSession()->setFlash('collection', $collection->toArray());
            \Yii::$app->getSession()->setFlash('error', $collection->getErrorSummary(true));
            return $this->redirect(['course/video-collection-index','id'=>$collection->id,'course'=>$collection->course_id]);
        }
        
        $file = UploadedFile::getInstanceByName('thumbnail');
        if ( null !== $file && !$file->hasError ) {
            $file->saveAs(\Yii::$app->basePath.'/web/uploads/courses/video-collections/thumbnails/'.$collection->id.'-'.time());
            $collection->thumbnail_url = Url::to('uploads/courses/video-collections/thumbnails/'.$collection->id.'-'.time(), true);
            $collection->save();
        }
        
        $this->redirect(['course/video-collection-index','course'=>$collection->course_id]);
    }
    
    /**
     * 
     */
    public function actionVideoIndex( $collection ) {
        $collection = MdlCourseVideoCollections::findOne($collection);
        $videos = MdlCourseVideos::findAll(['collection_id'=>$collection->id]);
        return $this->render('video-index',['videos'=>$videos,'collection'=>$collection]);
    }
    
    /**
     *
     */
    public function actionVideoEdit( $collection, $id=null ) {
        $video = new MdlCourseVideos();
        $video->collection_id = $collection;
        return $this->render('video-edit',['video'=>$video]);
    }
    
    /**
     * 保存视频
     * @return string
     */
    public function actionVideoSave() {
        $video = new MdlCourseVideos();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $video = MdlCourseVideos::findOne($id);
        }
        if ( null === $video ) {
            return $this->trigger404();
        }
        
        $form = \Yii::$app->getRequest()->post('form');
        $video->setAttributes($form);
        if ( !$video->save() ) {
            \Yii::$app->getSession()->setFlash('video', $video->toArray());
            \Yii::$app->getSession()->setFlash('error', $video->getErrorSummary(true));
            return $this->redirect(['course/video-edit','collection'=>$video->collection_id,'id'=>$video->id]);
        }
        
        # 保存视频
        $file = UploadedFile::getInstanceByName('video');
        if ( null !== $file && !$file->hasError ) {
            $file->saveAs(\Yii::$app->basePath.'/web/uploads/courses/video-collections/videos/'.$video->id.'.mp4');
            $video->video_url = Url::to('uploads/courses/video-collections/videos/'.$video->id.'.mp4', true);
            $video->save();
        }
        
        # 保存封面
        $thumbnail = \Yii::$app->getRequest()->post('thumbnail');
        $thumbnail = substr($thumbnail, 22);
        $thumbnail = base64_decode($thumbnail);
        file_put_contents(\Yii::$app->basePath.'/web/uploads/courses/video-collections/videos/thumbnails/'.$video->id.'-'.time().'.png', $thumbnail);
        $video->thunmnail_url = Url::to('uploads/courses/video-collections/videos/thumbnails/'.$video->id.'-'.time().'.png', true);
        $video->save();
        
        $this->redirect(['course/video-index','collection'=>$video->collection_id]);
    }
}
