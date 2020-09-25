<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
use yii\helpers\Html;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlUserCourseCards $card */
?>
<?php echo Alert::widget(); ?>
<form action="<?php echo Url::to(['course/card-save']); ?>" method="post">
  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
  <input type="hidden" name="form[course_id]" value="<?php echo $course->id; ?>">
  <div class="form-group">
    <label>标题</label>
    <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($card->title); ?>">
  </div>
  <div class="form-group">
    <label>内容</label>
    <textarea rows="10" class="form-control" name="form[content]"><?php echo Html::encode($card->content); ?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">保存</button>
</form>