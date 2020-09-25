<?php 
use yii\helpers\Url;
use yii\helpers\Html;

/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseTalks[] $talks */
?>
<div class="clearfix" style="">
  <div class="pull-right" role="group" aria-label="...">
    <a href="<?php echo Url::to(['course/talk-edit','course'=>$course->id]); ?>"><span class="glyphicon glyphicon-hand-right"></span> 发起讨论</a>
  </div>
</div>
<br>
<?php foreach ( $talks as $talk ) : ?>
<div style="padding: 10px 0;">
  <a href="<?php echo Url::to(['course/talk-detail','id'=>$talk->id]); ?>">
   <?php echo Html::encode($talk->title); ?>
  </a>
</div>
<?php endforeach; ?>