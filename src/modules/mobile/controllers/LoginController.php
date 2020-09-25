<?php
namespace app\modules\mobile\controllers;
use app\modules\mobile\helpers\WebController;
class LoginController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/mobile/views/layouts/content';
    
    /**
     * 用户登录
     */
    public function actionIndex() {
        return $this->render('index');
    }
    
    /**
     * @return string
     */
    public function actionRegister() {
        return $this->render('register');
    }
}