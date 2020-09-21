<?php
/* @var string $token */
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
        <p class="login-box-msg">重新输入密码来更新密码</p>
        <?php echo Alert::widget(); ?>
        <form action="<?php echo Url::to(['login/password-update']);?>" method="post">
          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <input type="hidden" name="token" value="<?php echo $token; ?>">
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="新密码" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="确认密码" name="password_confirm">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">重置密码</button>
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