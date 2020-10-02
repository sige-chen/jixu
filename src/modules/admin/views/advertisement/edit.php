<?php 
use yii\helpers\Url;
use app\widgets\Alert;
use yii\helpers\Html;
use app\modules\admin\widgets\FormFileUploadField;
use yii\base\Widget;
use app\modules\admin\widgets\FormDictSelectField;
/* @var \app\models\MdlAdvertisements $ad */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['advertisement/index']);?>">广告管理</a></li>
  <li class="breadcrumb-item">广告编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">广告编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" action="<?php echo Url::to(['advertisement/save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $ad->id; ?>">
      
      <div class="form-group">
        <label>广告图片</label>
        <img src="<?php echo $ad->image_url; ?>" id="img-priview">
        <input type="hidden" name="form[image_url]" value="<?php echo $ad->image_url;?>">
        <?php if ( $ad->getIsNewRecord() ) : ?>
        <?php echo FormFileUploadField::widget(['type' => 'advertisement-image','saveUrlTo' => '[name="form[image_url]"]','preViewImage' => '#img-priview',]);?>
        <?php endif; ?>
      </div>
      
      <div class="form-group">
        <label>标题</label>
        <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($ad->title);?>" id="txt-title">
      </div>
      
      <div class="form-group">
        <label>目标链接</label>
        <input type="text" class="form-control" name="form[target_url]" value="<?php echo Html::encode($ad->target_url);?>">
      </div>
      
      <?php echo FormDictSelectField::widget(['label'=>'广告位置','name'=>'form[position]', 'dictGroup'=>'AD_POSITION', 'value'=>$ad->position]); ?>
      
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<style>
#img-priview {max-width: 100%;border: solid #929292 1px;padding: 10px;margin-bottom: 10px;display: block;}
</style>