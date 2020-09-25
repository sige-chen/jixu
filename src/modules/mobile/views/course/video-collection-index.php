<?php 
use yii\helpers\Html;
use yii\helpers\Url;

/* @var \app\models\MdlCourseVideoCollections[] $collections */
?>
<?php foreach ( $collections as $collection ) : ?>
<div class="row" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 0px #e7e7e7;margin: 0; margin-bottom:20px;">
  <div class="col-md-3">
    <img src="<?php echo $collection->thumbnail_url; ?>" style="width: 100%;">
  </div>
  <div class="col-md-9">
    <a href="<?php echo Url::to(['course/video-index', 'collection'=>$collection->id]); ?>">
      <h2 style="margin: 0;font-size: 24px;"><?php echo Html::encode($collection->title); ?></h2>
    </a>
    <p style="margin: 10px 0;color: #5b5b5b;"><?php echo Html::encode($collection->introduction); ?></p>
  </div>
</div>
<?php endforeach; ?>