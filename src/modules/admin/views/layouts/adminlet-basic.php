<?php 
use app\modules\admin\assets\AdminAsset;
/* @var $content string */
/* @var \yii\web\View $this */
$bundle = AdminAsset::register($this);
?>
<?php $this->beginPage(); ?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>技续后台管理系统登录</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?php echo $this->getAssetManager()->getAssetUrl($bundle, 'favicon.ico'); ?>" type="image/x-icon">
  <?php $this->head(); ?>
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  body {font-size: 14px;}
  </style>
</head>
<?php $this->beginBody(); ?>
<?= $content ?>
<?php $this->endBody(); ?>
</html>
<?php $this->endPage(); ?>