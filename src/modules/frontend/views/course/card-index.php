<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlUserCourseCards[] $cards */
/* @var \app\models\MdlCourses $course */
?>
<div class="clearfix" style="">
  <div class="pull-right" role="group" aria-label="...">
    <a href="<?php echo Url::to(['course/card-edit','course'=>$course->id]); ?>"><span class="glyphicon glyphicon-hand-right"></span> 添加卡片</a>
  </div>
</div>
<br>
<?php echo Alert::widget(); ?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach ( $cards as $card ) : ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $card->id;?>">
          <?php echo Html::encode($card->title); ?>
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $card->id;?>" class="panel-collapse collapse">
      <div class="panel-body">
        <?php echo Html::encode($card->content); ?>
        <div class="text-right">
          <a href="<?php echo Url::to(['course/card-delete', 'course'=>$course->id, 'id'=>$card->id]);?>" onclick="return confirm('是否确定删除该卡片？');">
            <span class="glyphicon glyphicon-trash"></span>
          </a>
          &nbsp;&nbsp;&nbsp;
          <a href="<?php echo Url::to(['course/card-edit', 'course'=>$course->id, 'id'=>$card->id]);?>">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>