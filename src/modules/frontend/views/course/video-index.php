<?php 
use yii\helpers\Url;

/* @var \app\models\MdlCourseVideos  $videos */
?>
<table class="table">
  <?php foreach ( $videos as $video ) : ?>
  <tr>
    <td>
      <a href="<?php echo Url::to(['course/video-watch', 'video'=>$video->id]); ?>"><?php echo $video->title; ?></a>
    </td>
  </tr>
  <?php endforeach; ?>
</table>
