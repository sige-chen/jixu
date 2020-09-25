<?php 
use yii\helpers\Url;
use yii\helpers\Html;
/* @var \app\models\MdlCourseTests[] $tests */
?>
<?php foreach ( $tests as $test ) : ?>
<div style="padding: 10px 0;">
  <a href="<?php echo Url::to(['course/test-testing','id'=>$test->id]); ?>">
    <?php echo Html::encode($test->title); ?>
  </a>
</div>
<?php endforeach; ?>