<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlCourseBookAttachments $attachment */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/book-attach-index','course'=>$attachment->course_id]);?>">教材附件管理</a></li>
  <li class="breadcrumb-item">教材附件编辑 </li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">教材在线版上传</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" action="<?php echo Url::to(['course/book-attach-save']);?>" enctype="multipart/form-data">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $attachment->id; ?>">
      <input type="hidden" name="form[course_id]" value="<?php echo $attachment->course_id; ?>">
      <?php if ( $attachment->getIsNewRecord() ): ?>
      <div class="form-group">
        <label>文件</label>
        <input type="file" class="form-control" name="file" onchange="onFileChanged()">
      </div>
      <?php endif; ?>
      <div class="form-group">
        <label>文件名</label>
        <input type="text" class="form-control" name="form[name]" value="<?php echo Html::encode($attachment->name); ?>">
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<script>
function onFileChanged() {
  $('[name="form[name]"]').val($('[name="file"]')[0].files[0].name);
}
</script>