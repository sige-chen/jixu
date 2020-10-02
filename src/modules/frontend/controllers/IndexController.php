<?php
namespace app\modules\frontend\controllers;
use app\models\MdlArticles;
use app\helpers\JxDictionary;
use app\models\MdlCourses;
use app\models\MdlAdminUsers;
use app\modules\frontend\helpers\WebController;
use app\models\MdlCompanyPartners;
use app\models\MdlAdvertisements;

class IndexController extends WebController {
    /**
     * 演示遮挡
     * @return string
     */
    public function actionDemo() {
        if ( 'jixu' === $this->request->post('code') ) {
            return $this->redirect(['index/index']);
        }
        return $this->render('demo');
    }
    
    /**
     * @return string
     */
    public function actionIndex() {
        $viewData = array();
        $this->layout = '@app/modules/frontend/views/layouts/content';
        $this->setPageTitle('首页');
        
        $notis = MdlArticles::find()->where(['type'=>JxDictionary::value('ARTICLE_TYPE', 'NOTI')])->limit(5)->orderBy(['id'=>SORT_DESC])->all();
        $viewData['notis'] = $notis;
        
        $banners = MdlAdvertisements::find()->where(['position'=>JxDictionary::value('AD_POSITION', 'INDEX_BANNER')])->all();
        $viewData['banners'] = $banners;
        
        $courses = MdlCourses::find()->where(['is_suggested'=>1])->limit(4)->all();
        $viewData['courses'] = $courses;
        
        $teachers = MdlAdminUsers::find()->where(['type'=>JxDictionary::value('ADMIN_USER_TYPE', 'TEACHER')])->limit(6)->all();
        $viewData['teachers'] = $teachers;
        
        $articleAboutComList = MdlArticles::find()->where(['type'=>JxDictionary::value('ARTICLE_TYPE', 'ABOUT_COM')])->orderBy(['date'=>SORT_DESC,'id'=>SORT_DESC])->limit(7)->all();
        $viewData['articleAboutComList'] = $articleAboutComList;
        
        $articleAboutNewsList = MdlArticles::find()->where(['type'=>JxDictionary::value('ARTICLE_TYPE', 'ABOUT_NEWS')])->orderBy(['date'=>SORT_DESC,'id'=>SORT_DESC])->limit(8)->all();
        $viewData['articleAboutNewsList'] = $articleAboutNewsList;
        
        $partComs = MdlCompanyPartners::findAll(['type'=>JxDictionary::value('COMPANY_PART_TYPE', 'COMPANY')]);
        $viewData['partComs'] = $partComs;
        
        $partSchools = MdlCompanyPartners::findAll(['type'=>JxDictionary::value('COMPANY_PART_TYPE', 'SCHOOL')]);
        $viewData['partSchools'] = $partSchools;
        return $this->render('index', $viewData);
    }
}
