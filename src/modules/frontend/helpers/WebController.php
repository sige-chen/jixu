<?php
namespace app\modules\frontend\helpers;
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
}