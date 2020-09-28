<?php 
use yii\helpers\Html;
use app\helpers\JxDictionary;
use app\modules\frontend\assets\FrontendAsset;
use yii\helpers\Url;
/* @var \app\models\MdlCourses $course */
/* @var string|null $online */
/* @var \app\models\MdlCourseBookLinks[] $links */
/* @var \app\models\MdlCourseBookAttachments[] $attachs */
?>
<?php if ( null !== $online) : ?>
<div class="row" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 0px #e7e7e7;margin: 0; margin-bottom:20px;">
  <div class="col-md-3">
    <img src="<?php echo FrontendAsset::getResUrl('images/course-book-online'); ?>" style="width: 100%;">
  </div>
  <div class="col-md-9">
    <h2 style="margin: 0;font-size: 24px;"><?php echo Html::encode($course->name); ?> 在线</h2>
    <p style="margin: 10px 0;color: #5b5b5b;"><?php echo Html::encode($course->name); ?> 在线版教材</p>
    <a href="<?php echo Url::to(['course/book-read', 'course'=>$course->id]); ?>">
      <button style="width: 150px;height: 34px;background-color: #ffe172;color: #ff6e6e;border: solid #ffbc00 1px;margin-top: 59px;">阅读</button>
    </a>
  </div>
</div>
<?php endif; ?>

<?php foreach ( $links as $link ) : ?>
<div class="row" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 0px #e7e7e7;margin: 0; margin-bottom:20px;">
  <div class="col-md-3">
    <img src="<?php echo $link->thumbnail_url; ?>" style="width: 100%;height:184px;">
  </div>
  <div class="col-md-9">
    <h2 style="margin: 0;font-size: 24px;"><?php echo Html::encode($link->title); ?></h2>
    <p style="margin: 10px 0;color: #5b5b5b;"><?php echo Html::encode(''); ?></p>
    <a href="<?php echo $link->link; ?>">
      <button style="width: 150px;height: 34px;background-color: #ffe172;color: #ff6e6e;border: solid #ffbc00 1px;margin-top: 59px;">
        <span><?php echo JxDictionary::getItemValueName('COURSE_BOOK_LINK_SOURCE', $link->source); ?></span> ￥ <?php echo $link->price; ?>
      </button>
    </a>
  </div>
</div>
<?php endforeach; ?>

<?php foreach ( $attachs as $attach ) : ?>
<div class="row" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 0px #e7e7e7;margin: 0; margin-bottom:20px;">
  <div class="col-md-3">
    <img src="images/course-book-attachment" style="width: 100%;">
  </div>
  <div class="col-md-9">
    <h2 style="margin: 0;font-size: 24px;"><?php echo Html::encode($attach->name); ?></h2>
    <p style="margin: 10px 0;color: #5b5b5b;">&nbsp;</p>
    <a href="<?php echo $attach->download_url; ?>">
      <button style="width: 150px;height: 34px;background-color: #ffe172;color: #ff6e6e;border: solid #ffbc00 1px;margin-top: 59px;">下载</button>
    </a>
  </div>
</div>
<?php endforeach;?>