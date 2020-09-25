<?php 
use yii\helpers\Url;
use yii\helpers\Html;

/* @var array $calendar */
/* @var array $iconmap */
/* @var array $dateinfo */
/* @var \app\models\MdlCourses $course */
?>
<div>
  <span style="line-height: 32px;">日期：<?php echo $dateinfo['curMon']; ?></span>
  <div class="pull-right">
    <a href="<?php echo Url::to(['course/calendar-index','id'=>$course->id,'time'=>$dateinfo['prevMon']]);?>"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></a>
    &nbsp;&nbsp;
    <a href="<?php echo Url::to(['course/calendar-index','id'=>$course->id,'time'=>$dateinfo['nextMon']]);?>"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
  </div>
</div>
<div class="calendar">
  <?php foreach ( $calendar as $day ): ?>
  <div class="day <?php if(isset($day['events'])):?>active<?php endif;?>">
    <div><?php echo $day['date']; ?></div>
    <div>
      <?php if ( isset($day['events']) ) :?>
        <?php foreach ( $day['events'] as $event ) : ?>
          <span class="event <?php echo $iconmap[$event->type]; ?>"
            title="<?php echo Html::encode($event->event); ?>"
          ></span>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php endforeach; ?>
</div>
<style>
.calendar {width: 100%;content: " ";display: table;}
.calendar .day.active {color: #2e2e2e;}
.calendar .day {color: #cacaca;box-sizing: border-box;width: 14.285%;float: left;height: 100px;padding: 5px;border: solid #b7b7b7 1px;}
.calendar .day .event {color: #bd2c2c;padding-right: 2px;}
</style>