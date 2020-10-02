<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlAdvertisements $ad */
?>
<input type="hidden" id="conf-zixun-popup" value="off">
<div class="container">
  <div class="row" style="padding:50px 0;">
    <div class="col-md-6">
      <?php if ( null !== $ad ) : ?>
      <img src="<?php echo $ad->image_url; ?>" style="width:100%;">
      <?php endif; ?>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
      <div style="padding: 50px 32px 100px 32px;border: solid #d8d8d8 1px;">
        <form action="<?php echo Url::to(['login/save-user']);?>" method="post">
          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <a href="<?php echo Url::to(['login/index','backurl'=>'/']); ?>" style="float: right;line-height: 42px;color: #7d7d7d;">返回登录</a>
          <h1>用户注册</h1>
          <?php echo Alert::widget(); ?>
          <br>
          <div class="form-group">
            <label>邮箱</label>
            <input type="text" name="email" class="form-control">
          </div>
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
          <button type="submit" class="btn btn-default" onclick="return onBtnRegisterClicked();">注册</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.js"></script>
<script>
/** 点击注册按钮 */
function onBtnRegisterClicked() {
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