<?php
namespace app\modules\admin\helpers;
use yii\web\Controller;
abstract class WebController extends Controller {
    public function trigger404() {
        echo "404";
    }
}