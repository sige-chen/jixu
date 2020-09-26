<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\modules\admin\assets\AdminAsset;
/* @var \app\models\MdlAdminUsers $user */
$user = Yii::$app->user->getIdentity();
/* @var $content string */
$activeMenuItem = (isset($this->params['ActiveMenuItem'])) ? $this->params['ActiveMenuItem'] : null;
$bundle = AdminAsset::register($this);
?>
<?php $this->beginPage(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>技续后台管理系统</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php $this->head(); ?>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  body {font-size: 14px;}
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <?php $this->beginBody(); ?>
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo Url::to(['index/index']); ?>" class="nav-link"></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="javascript:;" class="nav-link" id="lbl-title"></a>
        </li>
      </ul>
    </nav>
    
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="javascript:;" class="brand-link">
        <img src="<?php echo AdminAsset::getResUrl('img/logo.png'); ?>" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">后台管理系统</span>
      </a>
      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $user->photo_url; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo Html::encode($user->nickname); ?></a>
          </div>
          <div style="line-height: 32px;color: darkgrey;padding-left: 50%;">
            <a href="<?php echo Url::to(['login/logout']);?>"><i class="fas fa-sign-out-alt" style="line-height: 32px;"></i></a>
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?php echo Url::to(['index/index']); ?>" class="nav-link <?php if ('dashboard'==$activeMenuItem): ?>active<?php endif;?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>仪表盘</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::to(['course/index']); ?>" class="nav-link <?php if ('course'==$activeMenuItem): ?>active<?php endif;?>">
                <i class="nav-icon fas fa-file"></i>
                <p>课程管理</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::to(['page/index']); ?>" class="nav-link <?php if ('page'==$activeMenuItem): ?>active<?php endif;?>">
                <i class="nav-icon fas fa-file-code"></i>
                <p>页面管理</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::to(['employee/index']); ?>" class="nav-link <?php if ('employee'==$activeMenuItem): ?>active<?php endif;?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>职员管理</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo Url::to(['setting/index']); ?>" class="nav-link <?php if ('setting'==$activeMenuItem): ?>active<?php endif;?>">
                <i class="nav-icon fas fa-cog"></i>
                <p>系统配置</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    
    <div class="content-wrapper">
      <div><br></div>
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <?= $content ?>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>