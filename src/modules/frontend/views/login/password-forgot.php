<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
?>
<div style="background-color: #f1f1f1;">
  <form style="width: 500px;margin: auto;padding: 150px 0px;" action="<?php echo Url::to(['login/send-email'])?>" method="post">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
    <h1>通过注册邮箱重置密码</h1>
    <?php echo Alert::widget(); ?>
    <div><br></div>
    <div class="form-group">
      <label>邮箱地址</label>
      <input type="email" class="form-control" name="email">
    </div>
    <button type="submit" class="btn btn-default">发送邮件</button>
  </form>
</div>