<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\modules\admin\models\FrmLogin;
use app\modules\admin\models\MdlAdminUsers;
use app\modules\admin\models\MdlAdminPasswordResetTokens;
use app\modules\admin\helpers\AdminConfiguration;
use yii\helpers\Url;
/**
 * Default controller for the `admin` module
 */
class LoginController extends Controller {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-basic';
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        if ( !\Yii::$app->user->isGuest ) {
            return $this->redirect(['index/index']);
        }
        
        return $this->render('index');
    }
    
    /**
     * 
     */
    public function actionLogin() {
        $user = new FrmLogin();
        if ( $user->load(\Yii::$app->getRequest()->post()) && $user->login() ) {
            return $this->redirect(['index/index']);
        } else {
            \Yii::$app->getSession()->setFlash('error', '无效的用户名或密码');
            return $this->redirect(['login/index']);
        }
    }
    
    /**
     * 忘记密码
     * @return string
     */
    public function actionForgotPassword() {
        return $this->render('forgot-password');
    }
    
    /**
     * 发送密码重置邮件
     * @return string
     */
    public function actionSendPasswordResetMail() {
        $address = \Yii::$app->getRequest()->post('email');
        $user = MdlAdminUsers::findOne(['email'=>$address]);
        if ( null === $user ) {
            \Yii::$app->getSession()->setFlash('error', '邮箱地址不存在');
            return $this->redirect(['login/forgot-password']);
        }
        
        MdlAdminPasswordResetTokens::deleteAll(['user_id'=>$user->id]);
        $token = new MdlAdminPasswordResetTokens();
        $token->user_id = $user->id;
        $token->expired_at = time() + AdminConfiguration::get('admin_password_reset_token_lifetime', 300);
        $token->token = md5(\Yii::$app->security->generateRandomKey());
        if ( !$token->save() ) {
            throw new \Exception("重置密码Token保存失败");
        }
        
        $link = Url::to(['login/password-reset', 'token'=>$token->token],true);
        $mail = \Yii::$app->mailer->compose()
            ->setTo($user->email)
            ->setSubject('重置密码')
            ->setHtmlBody($link);
        if ( !$mail->send() ) {
            throw new \Exception("邮件发送失败");
        }
        
        \Yii::$app->getSession()->setFlash('success', '邮件已经发送， 请登录邮箱查看。');
        return $this->redirect(['login/forgot-password']);
    }
    
    /**
     * 重置密码
     * @return string
     */
    public function actionPasswordReset( $token ) {
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
            \Yii::$app->getSession()->setFlash('error', '两次密码不一致。');
            return $this->redirect(['login/password-reset','token'=>$token]);
        }
        
        $resetToken = MdlAdminPasswordResetTokens::findOne(['token'=>$token]);
        if ( $resetToken->expired_at < time() ) {
            \Yii::$app->getSession()->setFlash('error', '密码重置链接已经过期。');
            return $this->redirect(['login/password-reset','token'=>$token]);
        }
        
        $user = MdlAdminUsers::findOne(['id'=>$resetToken->user_id]);
        $user->password = strtoupper(md5($password));
        $user->save();
        $resetToken->delete();
        
        \Yii::$app->getSession()->setFlash('success', '密码重置成功');
        return $this->redirect(['login/password-reset','token'=>$token]);
    }
    
    /**
     * 登出系统
     * @return string
     */
    public function actionLogout() {
        \Yii::$app->user->logout();
        return $this->redirect(['login/index']);
    }
}
