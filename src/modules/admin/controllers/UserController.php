<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\models\MdlUsers;
class UserController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * @var boolean
     */
    public $enableCsrfValidation = false;
    
    /**
     * @var string
     */
    public $activeMenuItem = 'user';
    
    /**
     * 用户列表
     * @return string
     */
    public function actionIndex() {
        $users = MdlUsers::find()->orderBy(['id'=>SORT_DESC])->all();
        return $this->render('index',['users'=>$users]);
    }
}