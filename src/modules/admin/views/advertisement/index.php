<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxDictionary;
/* @var \app\models\MdlAdvertisements[] $ads */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">广告管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">广告列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['advertisement/edit'])?>" class="btn btn-tool" title="添加广告"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">
    <div class="row">
      <?php foreach ( $ads as $ad ) : ?>
      <div class="col-md-6">
        <div class="ad-item">
          <strong><?php echo Html::encode(JxDictionary::getItemValueName('AD_POSITION', $ad->position));?></strong>
          &nbsp;&nbsp;
          <a href="<?php echo Url::to(['advertisement/edit','id'=>$ad->id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          &nbsp;&nbsp;
          <a href="<?php echo Url::to(['advertisement/delete','id'=>$ad->id]);?>" onclick="return confirm('是否确定删除该广告？');"><i class="fa fa-trash"></i></a>
          <img src="<?php echo $ad->image_url; ?>">
          <p>
            <span>目标：<?php echo $ad->target_url; ?></span><br>
            <span>标题：<?php echo Html::encode($ad->title); ?></span>
          </p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<style>
.ad-item {border: solid #a7a7a7 1px;padding: 10px;margin-bottom: 10px;}
.ad-item img {width:100%;display: block;margin: 10px 0;}
</style>