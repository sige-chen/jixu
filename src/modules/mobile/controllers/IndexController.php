<?php
namespace app\modules\mobile\controllers;
use app\modules\mobile\helpers\WebController;
class IndexController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/mobile/views/layouts/content';
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }
}
