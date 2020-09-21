<?php

namespace app\modules\admin;

use app\modules\admin\models\MdlAdminUsers;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::$app->user->identityClass = MdlAdminUsers::class;
    }
}
