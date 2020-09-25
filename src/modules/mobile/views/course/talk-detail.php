<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\widgets\Alert;

/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseTalks $talk */
/* @var \app\models\MdlCourseTalks[] $replies */
?>
<h2><?php echo Html::encode($talk->title);?></h2>
<div style="color: #6f6f6f;padding-top:20px;">
  <?php echo Html::encode($talk->content); ?>
</div>
<div style="padding-top:10px;" class="text-right">
  <a href="<?php echo Url::to(['course/talk-edit', 'id'=>$talk->id, 'course'=>$talk->course_id]); ?>">
    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
  </a>
</div>
<hr>

<?php foreach ( $replies as $reply ) : ?>
<div class="media">
  <?php $user = $reply->getUser(); ?>
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="<?php echo $user->photo_url; ?>" style="width: 50px;">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><?php echo Html::encode($user->nickname); ?></h4>
    <?php echo Html::encode($reply->content); ?>
  </div>
</div>
<?php endforeach; ?>
<hr>
<?php echo Alert::widget(); ?>
<form method="post" action="<?php echo Url::to(['course/talk-save']);?>">
  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
  <input type="hidden" name="id" value="">
  <input type="hidden" name="form[course_id]" value="<?php echo $course->id; ?>">
  <input type="hidden" name="form[title]" value="回复：<?php echo Html::encode($talk->title); ?>">
  <input type="hidden" name="form[parent_id]" value="<?php echo $talk->id; ?>">
  <input type="hidden" name="backurl" value="<?php echo Url::current(); ?>">
  <div class="form-group">
    <label>我来回复</label>
    <textarea rows="5" class="form-control" name="form[content]"></textarea>
  </div>
  <button type="submit" class="btn btn-default">回复</button>
</form>