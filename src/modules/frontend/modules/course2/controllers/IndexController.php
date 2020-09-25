<?php

namespace app\modules\frontend\modules\course\controllers;

use app\models\MdlCourses;

class IndexController extends \yii\web\Controller
{
    public function actionIndex( $id )
    {
        $this->layout = '@app/views/layouts/main';
        
        $course = MdlCourses::findOne($id);
        return $this->render('index',['course'=>$course]);
    }
}
