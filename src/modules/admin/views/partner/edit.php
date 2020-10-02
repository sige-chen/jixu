<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
use app\modules\admin\widgets\FormDictSelectField;
use app\modules\admin\widgets\FormFileUploadField;
/* @var \app\models\Mdlpartners $partner */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['partner/index'])?>">合作方管理</a></li>
  <li class="breadcrumb-item">合作方编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">合作方编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" action="<?php echo Url::to(['partner/save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $partner->id; ?>">
      
      <?php echo FormDictSelectField::widget(['label'=>'类型','name'=>'form[type]','dictGroup'=>'COMPANY_PART_TYPE','value'=>$partner->type]); ?>
      
      <div class="form-group">
        <label>名称</label>
        <input type="text" class="form-control" name="form[name]" value="<?php echo Html::encode($partner->name);?>">
      </div>
      
      <div class="form-group">
        <label>商标</label>
        <img src="<?php echo $partner->logo_url; ?>" id="img-priview">
        <input type="hidden" name="form[logo_url]" value="<?php echo $partner->logo_url;?>">
        <?php if ( $partner->getIsNewRecord() ) : ?>
        <?php echo FormFileUploadField::widget(['type' => 'partner-logo','saveUrlTo' => '[name="form[logo_url]"]','preViewImage' => '#img-priview',]);?>
        <?php endif; ?>
      </div>
      
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<style>
#img-priview {max-width: 100%;margin-bottom: 10px;display:block;}
</style>