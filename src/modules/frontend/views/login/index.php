<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlAdvertisements $ad */
/* @var string $backurl */
?>
<input type="hidden" id="conf-zixun-popup" value="off">
<div class="container">
  <div class="row" style="padding:50px 0;">
    <div class="col-md-6">
      <img src="<?php echo $ad->image_url; ?>" style="width:100%;">
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-4">
      <div style="padding: 50px 32px 100px 32px;border: solid #d8d8d8 1px;">
        <form action="<?php echo Url::to(['login/login']);?>" method="post">
          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <input type="hidden" value="<?php echo Html::encode($backurl);?>" name="backurl">
          <a href="<?php echo Url::to(['login/register']); ?>" style="float: right;line-height: 42px;color: #7d7d7d;">注册用户</a>
          <h1>登录</h1>
          <?php echo Alert::widget(); ?>
          <br>
          <div class="form-group">
            <label>邮箱</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group">
            <label>密码</label>
            <input type="password" name="password" class="form-control">
          </div>
          <button type="submit" class="btn btn-default" onclick="return onBtnLoginClicked();">登录</button>
          <a href="<?php echo Url::to(['login/password-forgot']);?>" style="float: right;line-height: 42px;color: #7d7d7d;">忘记密码</a>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.bootcss.com/blueimp-md5/2.10.0/js/md5.js"></script>
<script>
/** 点击登录按钮 */
function onBtnLoginClicked() {
  $('[name="password"]').val(md5($('[name="password"]').val()));
  return true;
}
</script>