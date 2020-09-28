<?php 
use yii\helpers\Html;
/* @var \app\models\MdlCourses $course */
$course = $this->params['course'];
$courseActiveItem = $this->params['courseActiveItem'];
/* @var mixed $this */
/* @var string $content */
?>
<?php $this->beginContent('@app/modules/frontend/views/layouts/course-big.php');?>
  <div class="col-md-9" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 0px #e7e7e7;padding-bottom: 0;">
    <?php echo $content;?>
    <br><br>
  </div>
  <div class="col-md-3" style="padding-right: 0;">
  <div style="background: white;padding: 20px;box-shadow: 5px 5px 5px 0px #e7e7e7;padding-bottom: 0;">
     <?php $teacher = $course->getTeacher(); ?>
     <img src="<?php echo $teacher->photo_url; ?>" style="width: 100%;">
     <hr>
     <p style="color: #676767;"><?php echo Html::encode($teacher->introduction);?></p>
     <br>
    </div>
  </div>
<?php $this->endContent();?>