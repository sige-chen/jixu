<?php
namespace app\modules\admin\widgets;
class FormFileUploadField extends \yii\bootstrap\Widget {
    /**
     * 上传的文件类型， 参考配置文件
     * @var string
     */
    public $type = null;
    
    /**
     * 文件上传后，文件访问路径存放的地址
     * @var string
     */
    public $saveUrlTo = null;
    
    /**
     * 上传成功后的预览图片选择符
     * @var unknown
     */
    public $preViewImage = null;
    
    /**
     * 上传成功后的预览视频选择符
     * @var unknown
     */
    public $previewVideo = null;
    
    /**
     * 完成后的回调
     * @var string
     */
    public $onComplete = '(function(){})();';
    
    /**
     * {@inheritDoc}
     * @see \yii\base\Widget::run()
     */
    public function run() {
        return $this->render('FormFileUploadField',['widget'=>$this]);
    }
}