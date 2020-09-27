<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use app\modules\admin\assets\AdminAsset;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlAdminUsers[] $teachers */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index'])?>">课程管理</a></li>
  <li class="breadcrumb-item">课程编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">课程编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo Url::to(['course/save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $course->id; ?>">
      
      <div class="form-group">
        <label>名称</label>
        <input type="text" class="form-control" name="form[name]" value="<?php echo Html::encode($course->name);?>">
      </div>
      
      <div class="form-group">
        <label>原价</label>
        <input type="number" class="form-control" name="form[price]" value="<?php echo Html::encode($course->price);?>">
      </div>
      
      <div class="form-group">
        <label>优惠价</label>
        <input type="number" class="form-control" name="form[preferential_price]" value="<?php echo Html::encode($course->preferential_price);?>">
      </div>
      
      <div class="form-group">
        <label>封面图片</label>
        <img 
          id="img-thumbnail"
          <?php if ( $course->getIsNewRecord() ): ?>
          src="<?php echo AdminAsset::getResUrl('img/course-default-thumbnail.png'); ?>"
          <?php else : ?>
          src="<?php echo $course->thumbnail_url;?>" 
          <?php endif; ?>
          onclick="onThumbnailClicked()"
        >
        <input type="file" class="form-control" name="thumbnail" id="file-thumbnail" onchange="onThumbnailFileChanged()">
      </div>
      
      <div class="form-group">
        <label>描述</label>
        <textarea id="txt-description" name="form[description]" class="form-control"
        ><?php echo Html::encode($course->description); ?></textarea>
      </div>
      
      <div class="form-group">
        <label>推荐到主页</label>
        <input type="hidden" name="form[is_suggested]" value="0">
        <input type="checkbox" class="form-control" name="form[is_suggested]" value="1" <?php if(1==$course->is_suggested):?>checked<?php endif;?> style="width: 24px;">
      </div>
      
      <div class="form-group">
        <label>简短介绍</label>
        <input type="text" class="form-control" name="form[short_desc]" value="<?php echo Html::encode($course->short_desc);?>">
      </div>
      
      <div class="form-group">
        <label>责任教师</label>
        <select class="form-control" name="form[teacher_id]">
          <?php foreach ( $teachers as $teacher ) : ?>
          <option value="<?php echo $teacher->id?>" <?php if($course->teacher_id==$teacher->id):?>selected<?php endif;?>>
            <?php echo Html::encode($teacher->nickname);?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
      
      <div class="form-group">
        <label>简称</label>
        <input type="text" class="form-control" name="form[short_name]" value="<?php echo Html::encode($course->short_name);?>">
      </div>
      
      <div class="form-group">
        <label>淘宝链接</label>
        <input type="text" class="form-control" name="form[taobao_link]" value="<?php echo Html::encode($course->taobao_link);?>">
      </div>
      
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<link rel="stylesheet" href="<?php echo AdminAsset::getResUrl('plugins/summernote/summernote-bs4.css'); ?>">
<script src="<?php echo AdminAsset::getResUrl('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
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

$(function () {
  $('#txt-description').summernote()
})
</script>
<style>
#file-thumbnail {display:none;}
#img-thumbnail {display: block;margin-bottom: 10px;width: 300px;}
#txt-description {width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;}
</style>