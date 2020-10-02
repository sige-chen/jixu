<?php
namespace app\modules\admin\widgets;
class FormDictSelectField extends \yii\bootstrap\Widget {
    /**
     * 标签
     * @var string
     */
    public $label = null;
    
    /**
     * 名称
     * @var string
     */
    public $name = null;
    
    /**
     * @var unknown
     */
    public $dictGroup = null;
    
    /**
     * @var unknown
     */
    public $value = null;
    
    /**
     * {@inheritDoc}
     * @see \yii\base\Widget::run()
     */
    public function run() {
        return $this->render('FormDictSelectField',['widget'=>$this]);
    }
}