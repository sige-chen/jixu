<?php 
use app\modules\frontend\widgets\Banner;
use yii\base\Widget;
use yii\helpers\Html;
use app\modules\frontend\widgets\Pager;
/* @var \app\models\MdlAdminUsers $teachers */
?>
<?php echo Banner::widget(['target'=>'teacher_index']); ?>
<div class="main">
  <div class="wp">
    <ul class="ul-tutor">
      <?php foreach ( $teachers as $teacher ) : ?>
      <li>
        <div class="item">
          <div class="head">
            <img src="<?php echo $teacher->photo_url; ?>" alt="">
          </div>
          <div class="txt">
            <div class="name"><?php echo Html::encode($teacher->nickname); ?></div>
            <div class="desc"><?php echo Html::encode($teacher->title); ?></div>
            <div><p><?php echo Html::encode($teacher->intorduction); ?></p></div>
          </div>
          <div class="btn-tab">
            <?php foreach ( $teacher->getCourses() as $course ): ?>
            <a href="javascript:;">
              <div class="inner">
                <span class="s1"><?php echo Html::encode($course->short_name); ?></span>
                <span class="s2">&nbsp;</span>
              </div>
            </a>
            <?php endforeach; ?>
          </div>
        </div>
      </li>
      <?php endforeach; ?>
    </ul>
    <?php echo Pager::widget(['query'=>$query]);?>
  </div>
</div>