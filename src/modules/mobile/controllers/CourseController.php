<?php
namespace app\modules\mobile\controllers;
use app\modules\mobile\helpers\WebController;
class CourseController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/mobile/views/layouts/content';
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
    
    public function actionDetail() {
        return $this->render('detail');
    }
    
    /**
     * 教材列表
     * @param unknown $id
     * @throws HttpException
     * @return string
     */
    public function actionBookIndex( $id ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'book');
        $this->setPageTitle($course->name.'教材');
        
        $online = null;
        if ( $course->hasOnlineBook ) {
            $online = Url::to("/uploads/courses/books/online/{$course->id}.pdf", true);
        }
        $links = MdlCourseBookLinks::findAll(['course_id'=>$course->id]);
        $attachs = MdlCourseBookAttachments::findAll(['course_id'=>$course->id]);
        return $this->render('book-index', [
            'course' => $course,
            'online' => $online,
            'links' => $links,
            'attachs' => $attachs,
        ]);
    }
    
    /**
     * 视频合集列表
     * @param unknown $id
     * @throws HttpException
     * @return string
     */
    public function actionVideoCollectionIndex( $id ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'video');
        $this->setPageTitle($course->name.'视频');
        
        $collections = MdlCourseVideoCollections::findAll(['course_id'=>$course->id]);
        return $this->render('video-collection-index', [
            'course' => $course,
            'collections' => $collections
        ]);
    }
    
    /**
     * 视频列表
     * @param unknown $collection
     * @return string
     */
    public function actionVideoIndex( $collection ) {
        $collection = MdlCourseVideoCollections::findOne($collection);
        if ( null === $collection ) {
            throw new HttpException(404);
        }
        
        $course = MdlCourses::findOne($collection->course_id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'video');
        $this->setPageTitle($course->name.'视频');
        $this->layout = '@app/modules/frontend/views/layouts/course';
        
        $videos = MdlCourseVideos::findAll(['collection_id'=>$collection->id]);
        return $this->render('video-index',[
            'videos' => $videos,
        ]);
    }
    
    /**
     * 视频播放
     * @param int $video
     * @return string
     */
    public function actionVideoWatch( $video ) {
        $video = MdlCourseVideos::findOne($video);
        if ( null === $video ) {
            throw new HttpException(404);
        }
        
        $collection = MdlCourseVideoCollections::findOne($video->collection_id);
        if ( null === $collection ) {
            throw new HttpException(404);
        }
        
        $course = MdlCourses::findOne($collection->course_id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'video');
        $this->setPageTitle($course->name.'视频');
        $this->layout = '@app/modules/frontend/views/layouts/course';
        
        return $this->render('video-watch',[
            'video' => $video,
        ]);
    }
    
    /**
     * 试题列表
     * @param unknown $id
     * @throws HttpException
     * @return string
     */
    public function actionTestIndex( $id ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'test');
        $this->setPageTitle($course->name.'试题');
        
        $tests = MdlCourseTests::findAll(['course_id'=>$course->id]);
        return $this->render('test-index',['tests'=>$tests,'course'=>$course]);
    }
    
    /**
     * 试题问题页
     * @return string
     */
    public function actionTestTesting( $id, $index=0 ) {
        $test = MdlCourseTests::findOne($id);
        if ( null === $test ) {
            throw new HttpException(404);
        }
        
        $question = MdlCourseTestQuestions::find()->where(['index'=>$index,'test_id'=>$test->id])->one();
        
        $course = MdlCourses::findOne($test->course_id);
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'test');
        $this->setPageTitle($course->name.'试题');
        $this->layout = '@app/modules/frontend/views/layouts/course';
        return $this->render('test-question',[
            'course' => $course,
            'test' => $test,
            'question' => $question,
        ]);
    }
    
    /**
     * 回答问题
     * @param unknown $question
     * @param unknown $answer
     */
    public function actionTestAnswer( ) {
        $question = MdlCourseTestQuestions::findOne($this->request->post('question'));
        $test = MdlCourseTests::findOne($question->test_id);
        
        $answerList = \Yii::$app->session->get("testing-{$test->id}",[]);
        $answerList[$question->index] = $this->request->post('answer');
        \Yii::$app->session->set("testing-{$test->id}", $answerList);
        
        if ( $question->index+1 >= $test->question_count ) {
            return $this->redirect(['course/test-done', 'test'=>$test->id]);
        }
        return $this->redirect(['course/test-testing', 'id'=>$question->test_id,'index'=>$question->index+1]);
    }
    
    /**
     * 完成测试
     * @return string
     */
    public function actionTestDone( $test ) {
        $test = MdlCourseTests::findOne($test);
        if ( null === $test ) {
            throw new HttpException(404);
        }
        
        $course = MdlCourses::findOne($test->course_id);
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'test');
        $this->setPageTitle($course->name.'试题');
        $this->layout = '@app/modules/frontend/views/layouts/course';
        
        $myAnswers = \Yii::$app->session->get("testing-{$test->id}");
        //\Yii::$app->session->remove("testing-{$test->id}");
        $questions = MdlCourseTestQuestions::find()->where(['test_id'=>$test->id])->orderBy(['index'=>SORT_ASC])->all();
        
        return $this->render('test-done',[
            'course' => $course,
            'test' => $test,
            'questions' => $questions,
            'myAnswers' => $myAnswers,
        ]);
    }
    
    /**
     * 笔记列表
     * @param unknown $id
     * @throws HttpException
     * @return string
     */
    public function actionNoteIndex( $id ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'note');
        $this->setPageTitle($course->name.'笔记');
        $notes = MdlCourseNotes::findAll(['course_id'=>$course->id]);
        return $this->render('note-index', [
            'course' => $course,
            'notes' => $notes,
        ]);
    }
    
    /**
     * 笔记详情
     * @param unknown $id
     */
    public function actionNoteDetail( $id ) {
        $note = MdlCourseNotes::findOne($id);
        if ( null === $note ) {
            throw new HttpException(404);
        }
        
        
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($note->course_id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'note');
        $this->setPageTitle($course->name.'笔记');
        return $this->render('note-detail',[
            'course' => $course,
            'note' => $note,
        ]);
    }
    
    /**
     * 编辑笔记
     * @param unknown $course
     * @throws HttpException
     * @return string
     */
    public function actionNoteEdit( $course, $id=null ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'note');
        $this->setPageTitle($course->name.'笔记');
        
        $note = new MdlCourseNotes();
        if ( !empty($id) ) {
            $note = MdlCourseNotes::findOne($id);
        }
        if ( null === $note ) {
            throw new HttpException(404);
        }
        return $this->render('note-edit',[
            'course' => $course,
            'note' => $note,
        ]);
    }
    
    /**
     * 笔记保存
     * @return string
     */
    public function actionNoteSave() {
        $note = new MdlCourseNotes();
        $id = $this->request->post('id');
        if ( !empty($id)) {
            $note = MdlCourseNotes::findOne($id);
        }
        
        $note->user_id = \Yii::$app->user->getId();
        $note->setAttributes($this->request->post('form'));
        if ( !$note->save() ) {
            return $this->goBackWithMessage('error', $note->getErrorSummary(true));
        }
        return $this->redirect(['course/note-detail', 'id'=>$note->id]);
    }
    
    /**
     * 讨论列表
     * @param int $id
     * @throws HttpException
     * @return string
     */
    public function actionTalkIndex( $id, $parent=0 ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'talk');
        $this->setPageTitle($course->name.'讨论');
        
        $talks = MdlCourseTalks::find()->where(['parent_id'=>$parent, 'course_id'=>$course->id])->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('talk-index',[
            'course' => $course,
            'talks' => $talks,
        ]);
    }
    
    /**
     * 讨论详情
     * @param unknown $id
     * @return string
     */
    public function actionTalkDetail( $id ) {
        $talk = MdlCourseTalks::findOne($id);
        if ( null === $talk ) {
            throw new HttpException(404);
        }
        
        $course = MdlCourses::findOne($talk->course_id);
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'talk');
        $this->setPageTitle($course->name.'讨论');
        
        $replies = MdlCourseTalks::find()->where(['parent_id'=>$talk->id])->orderBy(['id'=>SORT_ASC])->all();
        return $this->render('talk-detail',[
            'talk'=>$talk,
            'course' => $course,
            'replies' => $replies,
        ]);
    }
    
    /**
     * 讨论编辑
     * @param string $course
     * @return string
     */
    public function actionTalkEdit( $course, $id=null ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'talk');
        $this->setPageTitle('编辑讨论');
        
        $talk = new MdlCourseTalks();
        if ( !empty($id) ) {
            $talk = MdlCourseTalks::findOne($id);
        }
        if ( null === $talk ) {
            throw new HttpException(404);
        }
        return $this->render('talk-edit',[
            'course' => $course,
            'talk' => $talk,
        ]);
    }
    
    /**
     * 讨论保存
     * @return string
     */
    public function actionTalkSave() {
        $talk = new MdlCourseTalks();
        $id = $this->request->post('id');
        if ( !empty($id)) {
            $talk = MdlCourseTalks::findOne($id);
        }
        
        $talk->created_time = date('Y-m-d H:i:s');
        $talk->user_id = \Yii::$app->user->getId();
        $talk->setAttributes($this->request->post('form'));
        if ( !$talk->save() ) {
            return $this->goBackWithMessage('error', $talk->getErrorSummary(true));
        }
        
        $backurl = $this->request->post('backurl');
        if ( !empty($backurl) ) {
            return $this->redirect($backurl);
        }
        
        return $this->redirect(['course/talk-detail', 'id'=>$talk->id]);
    }
    
    /**
     * 同学列表
     * @param int $id
     * @throws HttpException
     * @return string
     */
    public function actionFriendIndex( $id ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'friend');
        $this->setPageTitle($course->name.'同学');
        
        $list = MdlUserCoursePurchases::findAll(['course_id'=>$course->id]);
        foreach ( $list as $index => $map ) {
            $list[$index] = $map->user_id;
        }
        $users = MdlUsers::findAll(['id'=>$list]);
        return $this->render('friend-index',['users'=>$users]);
    }
    
    /**
     * 卡片首页
     * @param integer $id
     * @throws HttpException
     * @return string
     */
    public function actionCardIndex( $id ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'card');
        $this->setPageTitle($course->name.'卡片');
        
        $condition = array();
        $condition['user_id'] = \Yii::$app->user->getId();
        $condition['course_id'] = $course->id;
        $cards = MdlUserCourseCards::findAll($condition);
        
        return $this->render('card-index',['cards'=>$cards, 'course'=>$course]);
    }
    
    /**
     * 卡片编辑
     * @param unknown $course
     * @param unknown $id
     * @return string
     */
    public function actionCardEdit( $course, $id=null ) {
        $course = MdlCourses::findOne($course);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $card = new MdlUserCourseCards();
        if ( null !== $id ) {
            $card = MdlUserCourseCards::findOne($id);
        }
        if ( null === $card ) {
            throw new HttpException(404);
        }
        
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $this->setPageTitle('添加卡片');
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'card');
        return $this->render('card-edit',[
            'course' => $course,
            'card' => $card,
        ]);
    }
    
    /**
     * 保存卡片
     * @return string
     */
    public function actionCardSave() {
        $card = new MdlUserCourseCards();
        $card->user_id = \Yii::$app->user->getId();
        $card->setAttributes($this->request->post('form'));
        if ( $card->save() ) {
            return $this->redirect(['course/card-index', 'id'=>$card->course_id]);
        } else {
            return $this->goBackWithMessage('error', $card->getErrorSummary(true));
        }
    }
    
    /**
     * 卡片删除
     * @param unknown $id
     * @return string
     */
    public function actionCardDelete( $id ) {
        $card = MdlUserCourseCards::findOne([
            'user_id' => \Yii::$app->user->getId(),
            'id' => $id,
        ]);
        if ( null !== $card ) {
            $card->delete();
        }
        $this->goBackWithMessage('success', '删除成功');
    }
    
    /**
     * 日历首页
     * @param unknown $id
     * @throws HttpException
     * @return string
     */
    public function actionCalendarIndex( $id, $time=null ) {
        $this->layout = '@app/modules/frontend/views/layouts/course';
        $course = MdlCourses::findOne($id);
        if ( null === $course ) {
            throw new HttpException(404);
        }
        
        $this->setLayoutParam('course', $course);
        $this->setLayoutParam('courseActiveItem', 'calendar');
        $this->setPageTitle($course->name.'日历');
        
        $time = (null===$time) ? time() : strtotime($time.'-1');
        $calendar = array();
        $date = new \DateTime();
        $date->setDate(date('Y', $time), date('m', $time), 1);
        $month = $date->format('n');
        
        $dayOfWeek = intval($date->format('N')) - 1;
        if ( 0 !== $dayOfWeek ) {
            $date->modify("-{$dayOfWeek} day");
            while ( $date->format('n') != $month ) {
                $calendar[$date->format('Y-m-d')] = array('date'=>$date->format('d'));
                $date->modify('+1 day');
            }
        }
        $condition = array(
            'date'=>$date->format('Y-m-d'),
            'course_id'=>$course->id,
            'user_id'=>\Yii::$app->user->getId()
        );
        while ( $date->format('n') == $month ) {
            $calendar[$date->format('Y-m-d')] = array(
                'date'=>$date->format('d'),
                'events'=>MdlUserCourseCalendarEvents::findAll($condition)
            );
            $date->modify('+1 day');
        }
        
        if ( 1 !== intval($date->format('N')) ) {
            while ( $date->format('N') <= 7 ) {
                $calendar[$date->format('Y-m-d')] = array('date'=>$date->format('d'));
                if ( 7 == $date->format('N') ) {
                    break;
                }
                $date->modify('+1 day');
            }
        }
        
        $iconMap = array();
        $iconMap[JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_CARD')] = 'glyphicon glyphicon-credit-card';
        $iconMap[JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_TALK_ASK')] = 'glyphicon glyphicon-edit';
        $iconMap[JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_TALK_REPLY')] = 'glyphicon glyphicon-share';
        $iconMap[JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_NOTE_ADD')] = 'glyphicon glyphicon-pencil';
        $iconMap[JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_TEST_TESTING')] = 'glyphicon glyphicon-ok-circle';
        $iconMap[JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_VIDEO_WATCHING')] = 'glyphicon glyphicon-film';
        $iconMap[JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_BOOK_READING')] = 'glyphicon glyphicon-book';
        
        $dateinfo = array();
        $dateinfo['nextMon'] = $date->format('Y-m');
        $date->modify('-1 month');
        $dateinfo['curMon'] = $date->format('Y-m');
        $date->modify('-1 month');
        $dateinfo['prevMon'] = $date->format('Y-m');
        return $this->render('calendar-index',['calendar'=>$calendar,'iconmap'=>$iconMap, 'dateinfo'=>$dateinfo,'course'=>$course]);
    }
}
