<?php 
use app\modules\frontend\widgets\Banner;
use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\Url;
/* @var \app\models\MdlCourses[] $courses */
/* @var \app\models\MdlPage $cusContent */
?>
<?php echo Banner::widget(['target'=>'COURSE_INDEX']); ?>
<div class="main">
  <div class="rowh1 bgf">
    <div class="wp">
      <div class="g-tit2">
        <h2>课程列表</h2>
      </div>
      <div><br><br></div>
      <ul class="ul-practice">
        <?php foreach ( $courses as $course ) : ?>
        <li>
          <div class="item i1">
            <i class="icon" style="background-image: url(<?php echo $course->thumbnail_url;?>);background-size: 100% 100%;"></i>
            <h5 class="name"><?php echo Html::encode($course->short_name);?></h5>
            <p class="desc"><?php echo Html::encode($course->short_desc);?></p>
            <a href="<?php echo Url::to(['course/detail','id'=>$course->id]); ?>">课程详情</a>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</div>
<?php if ( null !== $cusContent ): ?>
  <?php echo $cusContent->content; ?>
<?php endif; ?>