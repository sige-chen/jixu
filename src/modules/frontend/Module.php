<?php
namespace app\modules\frontend;
use app\models\MdlUsers;
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
        \Yii::$app->user->identityClass = MdlUsers::class;
        $this->params = require __DIR__ . '/config/config.php';
    }
}
