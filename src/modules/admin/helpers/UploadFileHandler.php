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
     * @param string $file
     * @return self
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
        $this->file->saveAs(\Yii::$app->basePath.'/web/uploads/'.$this->savePath);
        return Url::to('uploads/'.$this->savePath, true);
    }
    
    /**
     * @return boolean
     */
    public function hasFile() {
        return null !== $this->file;
    }
}