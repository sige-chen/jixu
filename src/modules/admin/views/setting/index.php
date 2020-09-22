<?php 
use yii\helpers\Url;
use yii\helpers\Html;

/* @var \app\models\MdlConfigurations $settings */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">系统配置</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">系统配置</h3>
  </div>
  <div class="card-body">
    <form action="<?php echo Url::to(['setting/save']);?>" method="post">
      <?php foreach ( $settings as $setting ) : ?>
      <div class="form-group">
        <label><?php echo Html::encode($setting->note); ?></label>
        <input type="text" class="form-control" name="form[<?php echo $setting->key;?>]" value="<?php echo Html::encode($setting->value); ?>">
      </div>
      <?php endforeach; ?>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>