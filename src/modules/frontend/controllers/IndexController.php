<?php
namespace app\modules\frontend\controllers;
use app\models\MdlArticles;
use app\helpers\JxDictionary;
use app\models\MdlBanners;
use app\models\MdlCourses;
use app\models\MdlAdminUsers;
use app\modules\frontend\helpers\WebController;

class IndexController extends WebController {
    /**
     * @return string
     */
    public function actionIndex() {
        $viewData = array();
        $this->layout = '@app/modules/frontend/views/layouts/content';
        $this->setPageTitle('首页');
        
        $notis = MdlArticles::find()->where(['type'=>JxDictionary::value('ARTICLE_TYPE', 'NOTI')])->limit(5)->orderBy(['id'=>SORT_DESC])->all();
        $viewData['notis'] = $notis;
        
        $banners = MdlBanners::find()->where(['target'=>'frontend_index'])->all();
        $viewData['banners'] = $banners;
        
        $courses = MdlCourses::find()->where(['is_suggested'=>1])->limit(4)->all();
        $viewData['courses'] = $courses;
        
        $teachers = MdlAdminUsers::find()->where(['type'=>JxDictionary::value('ADMIN_USER_TYPE', 'TEACHER')])->limit(6)->all();
        $viewData['teachers'] = $teachers;
        
        $articleAboutComList = MdlArticles::find()->where(['type'=>JxDictionary::value('ARTICLE_TYPE', 'ABOUT_COM')])->orderBy(['date'=>SORT_DESC])->limit(7)->all();
        $viewData['articleAboutComList'] = $articleAboutComList;
        
        $articleAboutNewsList = MdlArticles::find()->where(['type'=>JxDictionary::value('ARTICLE_TYPE', 'ABOUT_NEWS')])->orderBy(['date'=>SORT_DESC])->limit(8)->all();
        $viewData['articleAboutNewsList'] = $articleAboutNewsList;
        return $this->render('index', $viewData);
    }
}
