<?php 
use yii\helpers\Html;
use yii\helpers\Url;
/* @var \app\models\MdlCourses $course */
$course = $this->params['course'];
$courseActiveItem = $this->params['courseActiveItem'];
/* @var mixed $this */
/* @var string $content */
?>
<?php $this->beginContent('@app/modules/frontend/views/layouts/content.php');?>
<div style="background-color: #f3f3f3;padding: 20px;">
  <div class="container">
    <p style="color: #7a7a7a;margin-bottom:10px;">首页 &gt; 课程详情</p>
    <div class="row" style="background: white;padding: 20px 0 10px 0;box-shadow: 5px 5px 5px 0px #e7e7e7;padding-bottom: 0;">
      <div class="col-md-4">
        <img src="<?php echo $course->thumbnail_url;?>" style="width: 100%;height:250px;">
      </div>
      <div class="col-md-8">
        <div class="btn-group pull-right">
          <?php if ( $course->isCollected ) :?>
          <button type="button" class="btn btn-default">
            <a href="<?php echo Url::to(['course/collection-delete', 'course'=>$course->id]); ?>">
              <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
            </a>
          </button>
          <?php else :?>
          <button type="button" class="btn btn-default">
            <a href="<?php echo Url::to(['course/collect', 'course'=>$course->id]); ?>">
              <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
            </a>
          </button>
          <?php endif; ?>
        </div>
        <h1 style="margin: 0 0 20px 0;font-size: 32px;"><?php echo Html::encode($course->name); ?></h1>
        <p style="color: #969696;margin-bottom: 20px;"><?php echo $course->getUserPurchaseCount(); ?> 人购买</p>
        <p>
          <span style="font-size: 32px;color: #ff3b3b;">￥<?php echo $course->preferential_price;?></span>
          <span style="text-decoration: line-through;color: #b1b1b1;">￥<?php echo $course->price; ?></span>
        </p>
        <div style="margin-top: 59px;">
          <button style="width: 200px;height: 50px;background-color: #ff4444;color: #f7f7f7;border: solid #ff0202 1px;">立即购买</button>
        </div>
      </div>
      <div class="col-md-12" style="background-color: #f7f7f7;margin-top: 10px;border-top: solid #cacaca 1px;">
        <ul class="course-menu">
          <li class="item <?php if ('index'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/detail','id'=>$course->id]); ?>">介绍</a>
          </li>
          <li class="item <?php if ('book'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/book-index','id'=>$course->id]); ?>">教材</a>
          </li>
          <li class="item <?php if ('video'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/video-collection-index','id'=>$course->id]); ?>">视频</a>
          </li>
          <li class="item <?php if ('test'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/test-index','id'=>$course->id]); ?>">试题</a>
          </li>
          <li class="item <?php if ('note'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/note-index','id'=>$course->id]); ?>">笔记</a>
          </li>
          <li class="item <?php if ('talk'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/talk-index','id'=>$course->id]); ?>">讨论</a>
          </li>
          <li class="item <?php if ('friend'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/friend-index','id'=>$course->id]); ?>">同学</a>
          </li>
          <li class="item <?php if ('card'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/card-index','id'=>$course->id]); ?>">卡片</a>
          </li>
          <li class="item <?php if ('calendar'===$courseActiveItem):?>active<?php endif;?>">
            <a href="<?php echo Url::to(['course/calendar-index','id'=>$course->id]); ?>">日历</a>
          </li>
        </ul>
      </div>
    </div>
    
    <div class="row" style="margin-top:20px;padding: 0;">
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
    </div>
  </div>
</div>
<div><br></div>
<style>
.course-menu {padding: 0;margin: 0;}
.course-menu .item.active > a {background: transparent !important;}
.course-menu .item.active {background-color: #d6d6d6;}
.course-menu .item {display: inline-block;padding: 2px 10px;margin: 2px 10px;color: #595959;border-radius: 5px;}
</style>
<?php $this->endContent();?>  