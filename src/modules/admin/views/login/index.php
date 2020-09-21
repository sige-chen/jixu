<?php
use app\widgets\Alert;
use yii\helpers\Url;
?>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <img alt="技续" src="/img/logo.png">
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">欢迎登录系统后台</p>
        <?php echo Alert::widget(); ?>
        <form action="index.php?r=admin/login/login" method="post">
          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="用户名" name="FrmLogin[username]">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="密码" name="FrmLogin[password]">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8"> </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">登录</button>
            </div>
          </div>
        </form>
        <p class="mb-1">
          <br>
          <a href="<?php echo Url::to(['login/forgot-password']);?>">忘记密码</a>
        </p>
      </div>
    </div>
  </div>
</body>
