<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
use yii\bootstrap\Html;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseTalks $talk */
?>
<?php echo Alert::widget(); ?>
<form method="post" action="<?php echo Url::to(['course/talk-save']);?>">
  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
  <input type="hidden" name="form[course_id]" value="<?php echo $course->id; ?>">
  <input type="hidden" name="id" value="<?php echo $talk->id; ?>">
  <div class="form-group">
    <label>标题</label>
    <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($talk->title); ?>">
  </div>
  <div class="form-group">
    <label>内容</label>
    <textarea rows="10" class="form-control" name="form[content]"><?php echo Html::encode($talk->content); ?></textarea>
  </div>
  <button type="submit" class="btn btn-default">发布</button>
</form>