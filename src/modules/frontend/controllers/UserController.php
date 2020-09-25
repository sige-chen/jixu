<?php
namespace app\modules\frontend\controllers;
use app\modules\frontend\helpers\WebController;
use app\models\MdlUserCoursePurchases;
use app\models\MdlCourses;
use app\models\MdlUserCourseCollections;
use app\modules\admin\helpers\UploadFileHandler;
class UserController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/frontend/views/layouts/user-home';
    
    /**
     * 个人中心
     * @return string
     */
    public function actionHome() {
        return $this->redirect(['user/home-course-index']);
    }
    
    /**
     * 个人中心课程列表
     * @return string
     */
    public function actionHomeCourseIndex() {
        $this->setPageTitle('个人中心');
        $this->setLayoutParam('menuActiveItem', 'course');
        
        $list = MdlUserCoursePurchases::findAll(['user_id'=>\Yii::$app->user->id]);
        foreach ( $list as $index => $item ) {
            $list[$index] = $item->id;
        }
        $courses = MdlCourses::findAll(['id'=>$list]);
        return $this->render('course-index', ['courses'=>$courses]);
    }
    
    /**
     * 个人中心收藏列表
     * @return string
     */
    public function actionHomeCourseCollectionIndex() {
        $this->setPageTitle('个人中心');
        $this->setLayoutParam('menuActiveItem', 'collection');
        
        $list = MdlUserCourseCollections::findAll(['user_id'=>\Yii::$app->user->id]);
        foreach ( $list as $index => $item ) {
            $list[$index] = $item->id;
        }
        $courses = MdlCourses::findAll(['id'=>$list]);
        return $this->render('course-collection-index', ['courses'=>$courses]);
    }
    
    /**
     * 个人信息设置
     * @return string
     */
    public function actionHomeProfileIndex() {
        $this->setPageTitle('个人中心');
        $this->setLayoutParam('menuActiveItem', 'profile');
        return $this->render('home-profile',[
            'user' => \Yii::$app->user->getIdentity()
        ]);
    }
    
    /**
     * 保存头像
     * @return string
     */
    public function actionHomeProfilePhotoSave() {
        $user = \Yii::$app->user->getIdentity();
        $time = time();
        
        $file = UploadFileHandler::handle('file')
            ->setAllowedExtensions(['png','jpg'])
            ->setSavePath("users/avatars/{$user->id}-{$time}");
        if ( !$file->validate()->hasError() ) {
            $user->photo_url = $file->saveAndGetDownloadUrl();
            $user->save();
            return $this->goBackWithMessage('success', '头像更新成功');
        } else {
            return $this->goBackWithMessage('error', $file->errors);
        }
    }
    
    /**
     * 保存基础信息
     * @return string
     */
    public function actionHomeProfileBasicSave() {
        /* @var \app\models\MdlUsers $user */
        $user = \Yii::$app->user->getIdentity();
        $user->setAttributes($this->request->post('form'));
        if ( $user->save() ) {
            return $this->goBackWithMessage('success', '信息更新成功');
        } else {
            return $this->goBackWithMessage('error', $user->errors);
        }
    }
    
    /**
     * 保存密码信息
     * @return string
     */
    public function actionHomeProfilePasswordSave() {
        /* @var \app\models\MdlUsers $user */
        $user = \Yii::$app->user->getIdentity();
        $user->password = $this->request->post('password');
        if ( $user->save() ) {
            return $this->goBackWithMessage('success', '密码更新成功');
        } else {
            return $this->goBackWithMessage('error', $user->errors);
        }
    }
}