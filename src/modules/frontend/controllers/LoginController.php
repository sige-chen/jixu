<?php
namespace app\modules\frontend\controllers;
use app\modules\frontend\helpers\WebController;
use app\models\MdlAdvertisements;
use app\models\MdlUsers;
class LoginController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/frontend/views/layouts/content';
    
    /**
     * 登录页
     * @return string
     */
    public function actionIndex( $backurl=null ) {
        $this->setPageTitle('用户登录');
        if ( empty($backurl) ) {
            $backurl = $this->request->referrer;
        }
        
        $ads = MdlAdvertisements::getAdList('LOGIN_LEFT');
        return $this->render('index', ['ad'=>$ads[0],'backurl' => $backurl]);
    }
    
    /**
     * 用户登录
     * @return string
     */
    public function actionLogin() {
        $email = $this->request->post('email');
        $password = $this->request->post('password');
        $backurl = $this->request->post('backurl');
        
        $user = MdlUsers::findOne(['email'=>$email]);
        if ( null === $user || $user->password !== $password ) {
            \Yii::$app->getSession()->setFlash('error', '无效的用户或密码');
            return $this->redirect(['login/index','backurl'=>$backurl]);
        }
        \Yii::$app->user->login($user, 3600*24);
        return $this->redirect($backurl);
    }
    
    /**
     * 用户注册
     * @return string
     */
    public function actionRegister() {
        $this->setPageTitle('用户注册');
        $ads = MdlAdvertisements::getAdList('REGISTER_LEFT');
        return $this->render('register', ['ad'=>$ads[0]]);
    }
    
    /**
     * 保存用户
     * @return string
     */
    public function actionSaveUser() {
        $user = new MdlUsers();
        $user->email = $this->request->post('email');
        $user->password = $this->request->post('password');
        if ( !$user->save() ) {
            return $this->goBackWithMessage('error', $user->getErrorSummary(true));
        } else {
            return $this->goBackWithMessage('success', '用户注册成功');
        }
        return $this->redirect(['login/register']);
    }
    
    /**
     * 用户退出
     * @return string
     */
    public function actionLogout() {
        \Yii::$app->user->logout();
        return $this->redirect($this->request->referrer);
    }
}