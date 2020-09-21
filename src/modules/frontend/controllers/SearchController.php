<?php

namespace app\modules\frontend\controllers;

class SearchController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
