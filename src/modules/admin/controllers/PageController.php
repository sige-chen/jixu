<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\models\MdlPage;
use app\helpers\JxDictionary;
class PageController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * 页面列表
     * @return string
     */
    public function actionIndex() {
        $pages = MdlPage::find()->orderBy(['id'=>SORT_DESC])->all();
        $this->activeMenuItem('page');
        return $this->render('index',['pages'=>$pages]);
    }
    
    /**
     * 页面编辑
     * @param int $id
     * @return string
     */
    public function actionEdit( $id=null, $mode=null ) {
        $page = new MdlPage();
        $page->edit_mode = JxDictionary::value('PAGE_EDIT_MODE', 'DOC');
        if ( !empty($id) ) {
            $page = MdlPage::findOne($id);
        }
        if ( !empty($mode) ) {
            $page->edit_mode = $mode;
        }
        if ( null === $page ) {
            return $this->render404();
        }
        if ( $this->flashExists('page') ) {
            $page->setAttributes($this->flashGet('page'));
        }
        $this->activeMenuItem('page');
        return $this->render('edit',['page'=>$page]);
    }
    
    /**
     * 保存页面
     * @return string
     */
    public function actionSave() {
        $form = $this->request->post('form');
        
        $page = new MdlPage();
        $id = \Yii::$app->getRequest()->post('id');
        if ( !empty($id) ) {
            $page = MdlPage::findOne($id);
        }
        if ( null === $page ) {
            return $this->render404();
        }
        $page->setAttributes($form);
        if ( !$page->save() ) {
            $this->flashSetByArray(['page'=>$page->toArray(), 'error'=>$page->getErrorSummary(true)]);
            return $this->redirect(['page/edit','id'=>$page->id]);
        }
        return $this->redirect(['page/index']);
    }
}