<?php
namespace app\modules\frontend\controllers;
use yii\web\HttpException;
use app\models\MdlPage;
use app\modules\frontend\helpers\WebController;
class PageController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/frontend/views/layouts/content';
    
    /**
     * 显示自定义页面
     * @param string $name
     * @return string
     */
    public function actionShow( $name ) {
        $page = MdlPage::findOne(['name'=>$name]);
        if ( null === $page ) {
            throw new HttpException(404);
        }
        
        $this->setPageTitle($page->title);
        return $this->renderContent($page->content);
    }
}