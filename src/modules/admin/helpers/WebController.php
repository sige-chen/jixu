<?php
namespace app\modules\admin\helpers;
use yii\web\Controller;
use yii\web\Response;
abstract class WebController extends Controller {
    /**
     * @var string
     */
    public $activeMenuItem = null;
    
    /**
     * {@inheritDoc}
     * @see \yii\web\Controller::beforeAction()
     */
    public function beforeAction($action) {
        $this->activeMenuItem($this->activeMenuItem);
        return parent::beforeAction($action);
    }
    
    public function render404() {
        echo "404";
    }
    
    protected function activeMenuItem( $item ) {
        \Yii::$app->view->params['ActiveMenuItem'] = $item;
    }
    
    /**
     * 检查Flash键名是否存在
     * @param string $key
     * @return boolean
     */
    protected function flashExists($key) {
        return \Yii::$app->getSession()->hasFlash($key);
    }
    
    /**
     * 获取Flash内容
     * @param string $key
     * @param mixed $default
     * @param string $delete
     * @return mixed
     */
    protected function flashGet($key, $default=null, $delete=true) {
        return \Yii::$app->getSession()->getFlash($key,$default,$delete);
    }
    
    /**
     * 设置Flash内容
     * @param string $key
     * @param mixed $value
     */
    protected function flashSet($key, $value) {
        return \Yii::$app->getSession()->setFlash($key, $value);
    }
    
    /**
     * 设置Flash数据
     * @param array $data
     */
    protected function flashSetByArray( $data ) {
        foreach ( $data as $key => $value ) {
            $this->flashSet($key, $value);
        }
    }
    
    /**
     * 返回之前的一个页面
     * @return \yii\web\Response
     */
    protected function goBackWithError( $message ) {
        $this->flashSet('error', $message);
        return $this->redirect($this->request->referrer);
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