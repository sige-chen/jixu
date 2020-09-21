<?php

namespace app\modules\frontend\controllers;

class IndexController extends \yii\web\Controller
{ 
    public function actionIndex()
    {
        $this->layout = '@app/views/layouts/main';
        return $this->render('index');
    }
}
