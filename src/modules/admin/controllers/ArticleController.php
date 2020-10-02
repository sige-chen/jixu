<?php
namespace app\modules\admin\controllers;
use app\modules\admin\helpers\WebController;
use app\models\MdlArticles;
use app\modules\admin\assets\AdminAsset;
class ArticleController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/admin/views/layouts/adminlet-content';
    
    /**
     * @var boolean
     */
    public $enableCsrfValidation = false;
    
    /**
     * @var string
     */
    public $activeMenuItem = 'article';
    
    /**
     * 文章列表
     * @return string
     */
    public function actionIndex() {
        $atricles = MdlArticles::find()->all();
        return $this->render('index',['atricles'=>$atricles]);
    }
    
    /**
     * 编辑文章
     * @return string
     */
    public function actionEdit( $id=null ) {
        $article = new MdlArticles();
        $article->thumbnail_url = AdminAsset::getResUrl('img/dot.png');
        if ( null !== $id ) {
            $article = MdlArticles::findOne($id);
        }
        return $this->render('edit',['article'=>$article]);
    }
    
    /**
     * 保存文章
     * @return string
     */
    public function actionSave() {
        $id = $this->request->post('id');
        if ( !empty($id) ) {
            $article = MdlArticles::findOne($id);
        } else {
            $article = new MdlArticles();
        }
        
        $article->setAttributes($this->request->post('form'));
        if ( !$article->save() ) {
            return $this->goBackWithError($article->getErrorSummary(true));
        }
        return $this->redirect(['article/index']);
    }
    
    /**
     * 文章删除
     * @param int $admin
     * @return string
     */
    public function actionDelete( $id ) {
        $article = MdlArticles::findOne($id);
        if ( null !== $article ) {
            $article->delete();
        }
        return $this->redirect(['article/index']);
    }
}