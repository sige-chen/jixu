<?php
namespace app\modules\frontend\controllers;
use app\modules\frontend\helpers\WebController;
use app\models\MdlAdvertisements;
use app\models\MdlUsers;
use app\models\MdlUserPasswordResetTokens;
use app\helpers\JxConfiguration;
use yii\helpers\Url;
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
        return $this->render('index', [
            'ad' => isset($ads[0]) ? $ads[0] : null,
            'backurl' => $backurl
        ]);
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
        return $this->render('register', [
            'ad' => isset($ads[0]) ? $ads[0] : null,
        ]);
    }
    
    /**
     * 保存用户
     * @return string
     */
    public function actionSaveUser() {
        $user = new MdlUsers();
        $user->email = $this->request->post('email');
        $user->password = $this->request->post('password');
        $user->nickname = '用户'.time();
        $user->photo_url = '/img/avatar.png';
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
    
    /**
     * 忘记密码
     * @return string
     */
    public function actionPasswordForgot() {
        $this->setPageTitle('忘记密码');
        return $this->render('password-forgot');
    }
    
    /**
     * 发送邮件
     * @return string
     */
    public function actionSendEmail() {
        $address = \Yii::$app->getRequest()->post('email');
        $user = MdlUsers::findOne(['email'=>$address]);
        if ( null === $user ) {
            return $this->goBackWithMessage('error', '邮箱地址不存在');
        }
        
        MdlUserPasswordResetTokens::deleteAll(['user_id'=>$user->id]);
        $token = new MdlUserPasswordResetTokens();
        $token->user_id = $user->id;
        $token->expired_at = time() + 300;
        $token->token = md5(\Yii::$app->security->generateRandomKey());
        if ( !$token->save() ) {
            return $this->goBackWithMessage('error', $token->getErrorSummary(true));
        }
        
        $link = Url::to(['login/password-reset', 'token'=>$token->token],true);
        $mail = \Yii::$app->mailer->compose()
            ->setTo($user->email)
            ->setSubject('重置密码')
            ->setHtmlBody($link);
        if ( !$mail->send() ) {
            throw new \Exception("邮件发送失败");
        }
        return $this->goBackWithMessage('success', '邮件已经发送， 请登录邮箱查看。');
    }
    
    /**
     * 重置密码
     * @return string
     */
    public function actionPasswordReset( $token ) {
        $this->setPageTitle('更新密码');
        $resetToken = MdlUserPasswordResetTokens::findOne(['token'=>$token]);
        if ( null === $resetToken ) {
            return $this->redirect('/');
        }
        return $this->render('reset-password',['token'=>$token]);
    }
    
    /**
     * 更新密码
     */
    public function actionPasswordUpdate() {
        $token = \Yii::$app->getRequest()->post('token');
        $password = \Yii::$app->getRequest()->post('password');
        $confirm = \Yii::$app->getRequest()->post('password_confirm');
        if ( $password !== $confirm ) {
            return $this->goBackWithMessage('error', '两次密码不一致。');
        }
        
        $resetToken = MdlUserPasswordResetTokens::findOne(['token'=>$token]);
        if ( null === $resetToken || $resetToken->expired_at < time() ) {
            return $this->goBackWithMessage('error', '密码重置链接已经过期。');
        }
        
        $user = MdlUsers::findOne(['id'=>$resetToken->user_id]);
        $user->password = md5($password);
        $user->save();
        $resetToken->delete();
        
        return $this->goBackWithMessage('success', '密码重置成功');
    }
}