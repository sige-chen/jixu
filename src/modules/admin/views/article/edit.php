<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
use app\modules\admin\widgets\FormDictSelectField;
use app\modules\admin\widgets\FormFileUploadField;
use app\modules\admin\assets\AdminAsset;
/* @var \app\models\MdlArticles $article */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['article/index'])?>">文章管理</a></li>
  <li class="breadcrumb-item">文章编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">文章编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" action="<?php echo Url::to(['article/save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $article->id; ?>">
      
      <?php echo FormDictSelectField::widget(['label'=>'类型','name'=>'form[type]','dictGroup'=>'ARTICLE_TYPE','value'=>$article->type]); ?>
      
      <div class="form-group">
        <label>标题</label>
        <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($article->title);?>">
      </div>
      
      <div class="form-group">
        <label>简介</label>
        <textarea class="form-control" name="form[summary]"><?php echo Html::encode($article->summary);?></textarea>
      </div>
      
      <div class="form-group">
        <label>内容</label>
        <textarea class="form-control" name="form[content]"><?php echo Html::encode($article->content);?></textarea>
      </div>
      
      <div class="form-group">
        <label>缩略图</label>
        <img src="<?php echo $article->thumbnail_url; ?>" id="img-priview">
        <input type="hidden" name="form[thumbnail_url]" value="<?php echo $article->thumbnail_url;?>">
        <?php if ( $article->getIsNewRecord() ) : ?>
        <?php echo FormFileUploadField::widget(['type' => 'article-thumbnail','saveUrlTo' => '[name="form[thumbnail_url]"]','preViewImage' => '#img-priview',]);?>
        <?php endif; ?>
      </div>
      
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<link rel="stylesheet" href="<?php echo AdminAsset::getResUrl('plugins/summernote/summernote-bs4.css'); ?>">
<script src="<?php echo AdminAsset::getResUrl('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script type="text/javascript">
$(function () {
    $('[name="form[content]"]').summernote();
})
</script>
<style>
#img-priview {max-width: 100%;margin-bottom: 10px;}
</style>