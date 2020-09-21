<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlCourseVideos $video */
/* @var \app\models\MdlCourseVideoCollections $collection */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/video-collection-index','course'=>$collection->course_id]);?>">视频合集管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/video-index','collection'=>$video->collection_id])?>">视频列表</a></li>
  <li class="breadcrumb-item">视频编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">视频编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" enctype="multipart/form-data" action="<?php echo Url::to(['course/video-save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $video->id; ?>">
      <input type="hidden" name="form[collection_id]" value="<?php echo $video->collection_id; ?>">
      <input type="hidden" name="form[length]" value="<?php echo $video->length; ?>">
      <div class="form-group">
        <label>视频文件</label>
        <video id="video-preview" controls="controls"
          <?php if ( !$video->getIsNewRecord() ) : ?>
          src="<?php echo $video->video_url;?>"
          <?php endif;?>
        ></video>
        <?php if ( $video->getIsNewRecord() ) : ?>
        <input type="file" class="form-control" name="video" id="file-thumbnail" onchange="onFileVideoChange()">
        <?php endif; ?>
      </div>
      <div class="form-group">
        <label>标题</label>
        <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($video->title);?>" id="txt-title">
      </div>
      <div class="form-group">
        <label>编号</label>
        <input type="text" class="form-control" name="form[index]" value="<?php echo Html::encode($video->index);?>">
      </div>
      <div class="form-group">
        <label>视频封面</label>
        <img 
          <?php if ( $video->getIsNewRecord() ): ?>
          src="img/video-default-thumbnail.png" 
          <?php else : ?>
          src="<?php echo $video->thunmnail_url; ?>"
          <?php endif;?>
          id="img-thumbnail"
        >
        <input type="hidden" id="txt-thumbnail" name="thumbnail">
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<script>
/** 视频文件选择事件 */
function onFileVideoChange() {
  var files = document.getElementById("file-thumbnail").files[0];
  var url = URL.createObjectURL(files);
  $('#video-preview').attr('src', url);

  <?php if ($video->getIsNewRecord()) : ?>
  $('#txt-title').val($('#file-thumbnail')[0].files[0].name);
  <?php endif; ?>
  
  var video = $('#video-preview').get(0);
  video.currentTime = 1;
  video.oncanplay = () => {
    var scale = 0.5; 
    var canvas = document.createElement("canvas"); 
    canvas.width = video.videoWidth * scale; 
    canvas.height = video.videoHeight * scale; 
    canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height); 
    $('#img-thumbnail').attr('src', canvas.toDataURL("image/png"));
    $('#txt-thumbnail').val($('#img-thumbnail').attr('src'));
    $('[name="form[length]"]').val(parseInt($('#video-preview')[0].duration));
  }
}
</script>
<style>
#video-preview {display: block;margin-bottom: 10px;width: 500px}
#img-thumbnail {display: block;width: 200px;}
</style>