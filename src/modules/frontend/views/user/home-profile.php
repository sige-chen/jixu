<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\helpers\Html;
/* @var \app\models\MdlUsers $user */
?>
<?php echo Alert::widget(); ?>
<div class="panel panel-default">
  <div class="panel-heading">头像</div>
  <div class="panel-body">
    <form action="<?php echo Url::to(['user/home-profile-photo-save'])?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <div>
        <label for="exampleInputFile">文件</label>
        <input type="file" name="file">
      </div>
      <br>
      <button type="submit" class="btn btn-default">保存</button>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">基本信息</div>
  <div class="panel-body">
    <form action="<?php echo Url::to(['user/home-profile-basic-save'])?>" method="post">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <div class="form-group">
        <label>昵称</label>
        <input type="text" class="form-control" name="form[nickname]" value="<?php echo Html::encode($user->nickname); ?>">
      </div>
      <button type="submit" class="btn btn-default">保存</button>
    </form>
  </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">密码</div>
  <div class="panel-body">
    <form action="<?php echo Url::to(['user/home-profile-password-save'])?>" method="post">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <div class="form-group">
        <label>密码</label>
        <div class="input-group">
          <input type="password" name="password" class="form-control">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button" onmousedown="showPassword()" onmouseup="hidePassword()">
              <span class="glyphicon glyphicon-eye-open"></span>
            </button>
          </span>
        </div>
      </div>
      <button type="submit" class="btn btn-default" onclick="return onBtnRPasswordSaveClicked();">保存</button>
    </form>
  </div>
</div>
<script src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.js"></script>
<script>
/** 点击注册按钮 */
function onBtnRPasswordSaveClicked() {
  $('[name="password"]').val(md5($('[name="password"]').val()));
  return true;
}
/** 显示密码 */
function showPassword() {
  $('[name="password"]').attr('type', 'text');
}
/* 隐藏密码 */
function hidePassword() {
  $('[name="password"]').attr('type', 'password');
}
</script>