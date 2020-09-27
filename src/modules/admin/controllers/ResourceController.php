<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\modules\admin\helpers\UploadFileHandler;
use yii\helpers\Url;
class ResourceController extends WebController {
    /**
     * @var boolean
     */
    public $enableCsrfValidation = false;
    
    /**
     * 文件上传
     * @return string
     */
    public function actionUpload( $type ) {
        if ( !isset($this->module->params['uploads'][$type]) ) {
            return $this->ajaxError('缺少对应配置');
        }
        
        $config = $this->module->params['uploads'][$type];
        $handler = UploadFileHandler::setup($config);
        if ( $handler->validate()->hasError() ) {
            return $this->ajaxError(implode(';', $handler->errors));
        }
        
        $url = $handler->saveAndGetDownloadUrl();
        return $this->ajaxSuccess(['url'=>$url]);
    }
    
    /**
     * 保存Base64文件内容
     * @param unknown $type
     * @return string
     */
    public function actionSaveBase64Content( $type ) {
        $content = $this->request->post('content');
        $content = substr($content, strpos($content,',')+1);
        $content = base64_decode($content);
        
        if ( !isset($this->module->params['uploads'][$type]) ) {
            return $this->ajaxError('缺少对应配置');
        }
        $config = $this->module->params['uploads'][$type];
        $filename = md5(sprintf('%s-%s', \Yii::$app->getRequest()->remoteIP, microtime())).'.'.$config['ext'];
        
        $filepath = \Yii::$app->basePath.'/web/uploads/'.$config['path'].'/'.$filename;
        $folder = dirname($filepath);
        if ( !is_dir($folder) ) {
            mkdir($folder, 0777, true);
        }
        file_put_contents($filepath, $content);
        
        $url = Url::to("uploads/{$config['path']}/{$filename}", true);
        return $this->ajaxSuccess(['url'=>$url]);
    }
}