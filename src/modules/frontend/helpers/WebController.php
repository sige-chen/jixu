<?php
namespace app\modules\frontend\helpers;
use yii\helpers\Url;
use yii\web\Response;
abstract class WebController extends \yii\web\Controller {
    /**
     * 设置页面标题
     * @param string $title
     * @return void
     */
    protected function setPageTitle( $title ) {
        \Yii::$app->view->params['title'] = $title;
    }
    
    /**
     * 设置布局参数
     * @param string $key
     * @param mixed $value
     */
    protected function setLayoutParam( $key, $value ) {
        \Yii::$app->view->params[$key] = $value;
    }
    
    /**
     * 返回之前的一个页面并设置消息
     * @return \yii\web\Response
     */
    protected function goBackWithMessage( $type, $message ) {
        \Yii::$app->getSession()->setFlash($type, $message);
        return $this->redirect($this->request->referrer);
    }
    
    /**
     * 登录检查
     * @return \yii\web\Response
     */
    protected function loginRequired() {
        if ( \Yii::$app->user->getIsGuest() ) {
            return $this->redirect(['login/index', ['backurl'=>Url::current()]]);
        }
    }
    
    /**
     * @param unknown $message
     * @return \yii\web\Response
     */
    protected function ajaxError( $message ) {
        $this->response->format = Response::FORMAT_RAW;
        return json_encode([
            'success' => false,
            'message' => $message,
            'data' => null,
        ]);
    }
    
    /**
     * @param unknown $data
     */
    protected function ajaxSuccess( $data=null ) {
        $this->response->format = Response::FORMAT_RAW;
        return json_encode([
            'success' => true,
            'message' => '',
            'data' => $data,
        ]);
    }
}