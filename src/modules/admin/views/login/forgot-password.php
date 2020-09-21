<?php
use yii\helpers\Url;
use app\widgets\Alert;
?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img alt="技续" src="/img/logo.png">
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">输入邮箱地址，系统将会向邮箱内发送重置密码的链接，请通过该链接重置密码。</p>
        <?php echo Alert::widget(); ?>
        <form action="<?php echo Url::to(['login/send-password-reset-mail']); ?>" method="post">
          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="邮箱" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">发送邮件</button>
            </div>
          </div>
        </form>

        <p class="mt-3 mb-1">
          <a href="<?php echo Url::to(['login/index']); ?>">返回登录</a>
        </p>
      </div>
    </div>
  </div>
</body>