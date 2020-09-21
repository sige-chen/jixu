<?php
use yii\helpers\Url;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlCourses $course */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item">在线教材上传</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">教材在线版上传</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" action="<?php echo Url::to(['course/book-online-upload']);?>" enctype="multipart/form-data">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $course->id; ?>">
      <div class="form-group">
        <label>课程文件</label>
        <input type="file" class="form-control" name="file">
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>