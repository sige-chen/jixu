<?php

namespace app\modules\frontend\modules\course\controllers;

class BookController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = '@app/views/layouts/main';
        return $this->render('index');
    }
    
    public function actionRead() {
        return $this->render('read');
    }
}
