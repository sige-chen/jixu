<?php
namespace app\modules\frontend\controllers;
use app\modules\frontend\helpers\WebController;
use app\models\MdlAdminUsers;
use app\helpers\JxDictionary;
class TeacherController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/frontend/views/layouts/content';
    
    /**
     * 教师列表
     * @return void
     */
    public function actionIndex() {
        $this->setPageTitle('大牛导师');
        
        $query = MdlAdminUsers::find()
            ->where(['type'=>JxDictionary::value('ADMIN_USER_TYPE', 'TEACHER')])
            ->limit(15)
            ->orderBy(['id'=>SORT_DESC]);
        
        $teachers = $query->all();
        return $this->render('index',['teachers'=>$teachers, 'query'=>$query]);
    }
}