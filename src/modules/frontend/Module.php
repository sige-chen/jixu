<?php
namespace app\modules\frontend;
/**
 * frontend module definition class
 */
class Module extends \yii\base\Module {
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\frontend\controllers';

    /**
     * {@inheritdoc}
     */
    public function init() {
        parent::init();
        $this->modules = ['course'=>['class'=>'\\app\\modules\\frontend\\modules\\course\\Module']];
    }
}
