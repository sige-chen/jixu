<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
use app\modules\admin\widgets\FormFileUploadField;
/* @var \app\models\MdlAdminUsers $admin */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['employee/index']);?>">职员管理</a></li>
  <li class="breadcrumb-item">职员编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">职员列表</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" action="<?php echo Url::to(['employee/save']); ?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $admin->id; ?>">
      
      <div class="form-group">
      <label>用户名</label>
      <input type="text" class="form-control" name="form[username]" value="<?php echo Html::encode($admin->username); ?>">
    </div>
    <div class="form-group">
      <label>密码</label>
      <input type="text" class="form-control" name="form[password]" value="">
    </div>
    <div class="form-group">
      <label>邮箱</label>
      <input type="text" class="form-control" name="form[email]" value="<?php echo Html::encode($admin->email);?>">
    </div>
    <div class="form-group">
      <label>昵称</label>
      <input type="text" class="form-control" name="form[nickname]" value="<?php echo Html::encode($admin->nickname); ?>">
    </div>
    <div class="form-group">
      <label>职位</label>
      <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($admin->title);?>">
    </div>
    
    <div class="form-group">
      <label>头像</label>
      <img src="<?php echo $admin->photo_url; ?>" id="img-priview">
      <input type="hidden" name="form[photo_url]" value="<?php echo $admin->photo_url;?>">
      <?php echo FormFileUploadField::widget(['type' => 'admin-photo','saveUrlTo' => '[name="form[photo_url]"]','preViewImage' => '#img-priview',]);?>
    </div>
    
    <div class="form-group">
      <label>介绍</label>
      <textarea class="form-control" name="form[introduction]"><?php echo Html::encode($admin->introduction); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">保存</button>
  </form>
  </div>
</div>
<style>
#img-priview {max-width: 100%;margin-bottom: 10px;display:block;}
</style>