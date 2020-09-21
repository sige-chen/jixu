<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseVideoCollections $collection */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/video-collection-index','course'=>$collection->course_id]);?>">视频合集管理</a></li>
  <li class="breadcrumb-item">视频合集编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">视频合集编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo Url::to(['course/video-collection-save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $collection->id; ?>">
      <input type="hidden" name="form[course_id]" value="<?php echo $collection->course_id; ?>">
      <div class="form-group">
        <label>标题</label>
        <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($collection->title);?>">
      </div>
      <div class="form-group">
        <label>封面图片</label>
        <img 
          id="img-thumbnail"
          <?php if ( $collection->getIsNewRecord() ): ?>
          src="img/video-default-thumbnail.png"
          <?php else : ?>
          src="<?php echo $collection->thumbnail_url;?>" 
          <?php endif; ?>
          onclick="onThumbnailClicked()"
        >
        <input type="file" class="form-control" name="thumbnail" id="file-thumbnail" onchange="onThumbnailFileChanged()">
      </div>
      <div class="form-group">
        <label>描述</label>
        <textarea id="txt-description" name="form[introduction]" class="form-control"
        ><?php echo Html::encode($collection->introduction); ?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<script>
/** 点击封面图片后触发文件选择 */
function onThumbnailClicked() {
  $('#file-thumbnail').click();
}

/** 封面图片选中后 */
function onThumbnailFileChanged() {
  let fileInput = document.getElementById('file-thumbnail');
  let file = fileInput.files[0];
  let reader = new FileReader();
  reader.readAsDataURL(file);
  reader.onload = function(event) {
    $('#img-thumbnail').attr('src', this.result);
  }
}
</script>
<style>
#file-thumbnail {display:none;}
#img-thumbnail {display: block;margin-bottom: 10px;width: 300px;}
</style>