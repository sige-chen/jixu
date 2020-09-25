<?php

namespace app\modules\admin;

use app\models\MdlAdminUsers;

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
    public function init() {
        parent::init();
        \Yii::$app->user->identityClass = MdlAdminUsers::class;
        $this->setAliases(['@admin-assets' => __DIR__ . '/assets']);
    }
}
