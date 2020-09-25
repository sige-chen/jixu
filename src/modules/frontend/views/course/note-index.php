<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseNotes[] $notes */
?>
<div class="clearfix" style="">
  <div class="pull-right" role="group" aria-label="...">
    <a href="<?php echo Url::to(['course/note-edit','course'=>$course->id]); ?>"><span class="glyphicon glyphicon-hand-right"></span> 写笔记</a>
  </div>
</div>
<br>
<?php foreach ( $notes as $note ) : ?>
<div style="padding: 10px 0;">
  <a href="<?php echo Url::to(['course/note-detail','id'=>$note->id]); ?>">
   <?php echo Html::encode($note->title); ?>
  </a>
</div>
<?php endforeach; ?>