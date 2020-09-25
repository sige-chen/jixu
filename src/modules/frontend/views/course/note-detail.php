<?php
use yii\helpers\Html;
use yii\helpers\Url;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseNotes $note */
?>
<h1><?php echo Html::encode($note->title)?></h1>
<hr>
<div>
  <?php echo $note->content; ?>
</div>
<div class="text-right">
  <a href="<?php echo Url::to(['course/note-edit', 'id'=>$note->id, 'course'=>$note->course_id]); ?>">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
  </a>
</div>