<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
use app\modules\admin\helpers\WebController;
/**
 * Default controller for the `admin` module
 */
class IndexController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        if ( \Yii::$app->user->isGuest ) {
            return $this->redirect(['login/index']);
        }
        $this->activeMenuItem('dashboard');
        return $this->render('index');
    }
}
