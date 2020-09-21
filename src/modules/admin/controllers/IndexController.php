<?php
namespace app\modules\admin\controllers;
use yii\web\Controller;
/**
 * Default controller for the `admin` module
 */
class IndexController extends Controller {
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        if ( \Yii::$app->user->isGuest ) {
            return $this->redirect(['login/index']);
        }
        
        $user = \Yii::$app->user->getIdentity();
        $this->layout = '@app/modules/admin/views/layouts/adminlet-content';
        return $this->render('index');
    }
}
