<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
use yii\helpers\Html;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseNotes $note */
?>
<script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
<?php echo Alert::widget(); ?>
<form action="<?php echo Url::to(['course/note-save']); ?>" method="post">
  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
  <input type="hidden" name="form[course_id]" value="<?php echo $course->id; ?>">
  <input type="hidden" name="id" value="<?php echo $note->id; ?>">
  <div class="form-group">
    <label>标题</label>
    <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($note->title);?>">
  </div>
  <div class="form-group">
    <label>内容</label>
    <textarea id="content" name="form[content]"><?php echo Html::encode($note->content);?></textarea>
  </div>
  <button type="submit" class="btn btn-default">保存</button>
</form>
<script>
ClassicEditor
  .create( document.querySelector( '#content' ) )
  .catch( error => {
        console.error( error );
  });
</script>