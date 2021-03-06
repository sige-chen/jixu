<?php
namespace app\modules\frontend\controllers;
use app\modules\frontend\helpers\WebController;
use app\models\MdlArticles;
use yii\web\HttpException;
class ArticleController extends WebController {
    /**
     * @var string
     */
    public $layout = '@app/modules/frontend/views/layouts/content';
    
    /**
     * 根据分类展示文章
     * @param string $cat
     */
    public function actionCategory( $cat, $page=1 ) {
        $this->setPageTitle('文章列表');
        $size = 10;
        $query = MdlArticles::find()->where(['type'=>$cat])->orderBy(['id'=>SORT_DESC])->limit($size)->offset(($page-1)*$size);
        $articles = $query->all();
        return $this->render('index',['articles'=>$articles, 'query'=>$query]);
    }
    
    /**
     * 阅读文章
     * @param unknown $id
     */
    public function actionDetail( $id ) {
        $article = MdlArticles::findOne($id);
        if ( null === $article ) {
            throw new HttpException(404);
        }
        
        $this->setPageTitle($article->title);
        return $this->render('detail',['article'=>$article]);
    }
}