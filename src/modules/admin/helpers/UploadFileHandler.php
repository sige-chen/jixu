<?php
namespace app\modules\admin\helpers;
use yii\web\UploadedFile;
use yii\helpers\Url;

class UploadFileHandler {
    /**
     * @var UploadedFile
     */
    private $file = null;
    
    /**
     * @var array
     */
    public $errors = array();
    /**
     * @var unknown
     */
    private $savePath = null;
    /**
     * @var array
     */
    private $rules = array();
    
    /**
     * 通过配置项初始化
     * @param array $config
     * return self
     */
    public static function setup( $config ) {
        $handler = new self();
        $handler->file = UploadedFile::getInstanceByName($config['file']);
        if ( $config['require'] && (null===$handler->file) ) {
            $this->errors[] = '文件上传失败';
            return $handler;
        }
        
        $fileName = md5(sprintf('%s-%s', \Yii::$app->getRequest()->remoteIP, microtime()));
        if ( null !== $handler->file ) {
            $fileName = $fileName.'.'.$handler->file->getExtension();
        }
        $handler->setSavePath("{$config['path']}/{$fileName}");
        $handler->setAllowedExtensions($config['exts']);
        return $handler;
    }
    
    /**
     * @param string $file
     * @return self
     * @deprecated 请使用setup()来配置
     */
    public static function handle( $file ) {
        $handler = new self();
        $handler->file = UploadedFile::getInstanceByName($file);
        if ( null !== $handler->file && $handler->file->hasError ) {
            $handler->errors[] = '文件上传失败';
        }
        return $handler;
    }
    
    /**
     * @param unknown $size
     * @return self
     */
    public function setMaxSize( $size ) {
        $this->rules['maxSize'] = $size;
        return $this;
    }
    
    /**
     * @param unknown $size
     * @return self
     */
    public function setMaxSizeByConfig( $config, $default=null ) {
        $this->rules['maxSize'] = AdminConfiguration::get($config, $default);
        return $this;
    }
    
    /**
     * @param unknown $list
     * @return \app\modules\admin\helpers\UploadFileHandler
     */
    public function setAllowedExtensions( $list ) {
        $this->rules['extension'] = $list;
        return $this;
    }
    
    /**
     * @param array $rules
     */
    public function validate() {
        foreach ( $this->rules as $rule => $param ) {
            $handler = 'validate'.ucfirst($rule);
            $this->$handler($param);
        }
        return $this;
    }
    
    /**
     * @param unknown $size
     */
    private function validateMaxSize( $size ) {
        if ( null !== $this->file && !$this->file->hasError && $this->file->size > $size ) {
            $this->errors[] = sprintf('上传的文件不可超过%s', \Yii::$app->formatter->asShortSize($size));
        }
    }
    
    /**
     * @param unknown $types
     */
    private function validateExtension( $types ) {
        if ( null !== $this->file && !$this->file->hasError && !in_array($this->file->extension, $types) ) {
            $this->errors[] = '无效的文件类型';
        }
    }
    
    /**
     * @return boolean
     */
    public function hasError() {
        return 0 < count($this->errors);
    }
    
    /**
     * @param unknown $path
     */
    public function setSavePath( $path ) {
        $this->savePath = $path;
        return $this;
    }
    
    /**
     * @return string
     */
    public function saveAndGetDownloadUrl() {
        $filepath = \Yii::$app->basePath.'/web/uploads/'.$this->savePath;
        $folder = dirname($filepath);
        if ( !is_dir($folder) ) {
            mkdir($folder, 0777, true);
        }
        $this->file->saveAs($filepath);
        return Url::to('uploads/'.$this->savePath, true);
    }
    
    /**
     * @return boolean
     */
    public function hasFile() {
        return null !== $this->file;
    }
}