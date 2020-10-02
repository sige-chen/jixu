<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
/* @var string $token */
?>
<div style="background-color: #f1f1f1;">
  <form style="width: 500px;margin: auto;padding: 150px 0px;" action="<?php echo Url::to(['login/password-update'])?>" method="post">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
    <h1>更新密码</h1>
    <?php echo Alert::widget(); ?>
    <div><br></div>
    <input type="hidden" name="token" value="<?php echo $token; ?>">
    <div class="form-group">
      <label>新密码</label>
      <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
      <label>确认密码</label>
      <input type="password" class="form-control" name="password_confirm">
    </div>
    <button type="submit" class="btn btn-default">重置密码</button>
  </form>
</div>