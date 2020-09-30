<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseTests $test */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/test-index', 'course'=>$course->id]);?>"></a>试题管理</li>
  <li class="breadcrumb-item">试卷编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">编辑试卷</h3>
  </div>
  <div class="card-body">
  
  <?php echo Alert::widget();?>
    <form method="post" action="<?php echo Url::to(['course/test-save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $test->id; ?>">
      <input type="hidden" name="form[course_id]" value="<?php echo $test->course_id; ?>">
      <div class="form-group">
        <label>标题</label>
        <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($test->title);?>">
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>