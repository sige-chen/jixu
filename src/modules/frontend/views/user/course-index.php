<?php 
use yii\bootstrap\Html;
use yii\helpers\Url;

/* @var \app\models\MdlCourses $courses */
?>
<?php foreach ( $courses as $course ) : ?>
<div class="media">
  <div class="media-left">
    <a href="<?php echo Url::to(['course/detail','id'=>$course->id]); ?>">
      <img class="media-object" src="<?php echo $course->thumbnail_url;?>" width="50px">
    </a>
  </div>
  <div class="media-body">
    <a href="<?php echo Url::to(['course/detail','id'=>$course->id]); ?>">
      <h4 class="media-heading"><?php echo Html::encode($course->name); ?></h4>
    </a>
    <p><?php echo Html::encode($course->short_desc);?></p>
  </div>
</div>
<?php endforeach; ?>