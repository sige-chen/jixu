<?php 
use yii\helpers\Html;
use yii\helpers\Url;
/* @var string $content  */
/* @var \app\models\MdlUsers Mdl $user */
$user = Yii::$app->getUser()->getIdentity();
$menuItem = $this->params['menuActiveItem'];
?>
<?php $this->beginContent('@app/modules/frontend/views/layouts/content.php');?>
<div style="background-color: #efefef;padding: 20px;">
<div class="container">
  <div class="row">
    <div class="col-md-3">
      <div style="border: solid #ababab 1px;line-height: 52px;font-size: 24px;text-align: center;background: white;margin-bottom: 20px;">
        <img alt="<?php echo Html::encode($user->nickname); ?>" src="<?php echo $user->photo_url;?>" style="padding: 10px;display: block;width: 100%;">
        <p><?php echo Html::encode($user->nickname);?></p>
      </div>
      <div class="menu">
        <a href="<?php echo Url::to(['user/home-course-index']); ?>" class="<?php if ('course'===$menuItem): ?>active<?php endif;?>">我的课程</a>
        <a href="<?php echo Url::to(['user/home-course-collection-index']); ?>" class="<?php if ('collection'===$menuItem): ?>active<?php endif;?>">课程收藏</a>
        <a href="<?php echo Url::to(['user/home-profile-index']); ?>" class="<?php if ('profile'===$menuItem): ?>active<?php endif;?>">个人信息</a>
      </div>
    </div>
    <div class="col-md-9" style="background-color: white;padding: 10px;border: solid #a5a5a5 1px;">
      <?php echo $content; ?>
    </div>
  </div>
</div>
</div>
<style>
.menu a {  display: block;line-height: 64px;border: solid darkgrey 1px;padding-left: 20px;background: white;}
.menu a.active {background: #cccccc;color: white;}
</style>
<?php $this->endContent();?>  