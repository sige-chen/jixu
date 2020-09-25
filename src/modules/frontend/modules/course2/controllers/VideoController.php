<?php

namespace app\modules\frontend\modules\course\controllers;

class VideoController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->layout = '@app/views/layouts/main';
        return $this->render('index');
    }
    
    public function actionPlay()
    {
        return $this->render('play');
    }
}
