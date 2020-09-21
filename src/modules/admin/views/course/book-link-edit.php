<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxDictionary;
use app\widgets\Alert;
use yii\base\Widget;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseBookLinks $link */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/book-link-index','course'=>$link->course_id]);?>">教材链接管理</a></li>
  <li class="breadcrumb-item">教材链接编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">教材链接编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget();?>
    <form method="post" action="<?php echo Url::to(['course/book-link-save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $link->id; ?>">
      <input type="hidden" name="form[course_id]" value="<?php echo $link->course_id; ?>">
      <div class="form-group">
        <label>标题</label>
        <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($link->title);?>">
      </div>
      <div class="form-group">
        <label>链接</label>
        <input type="text" class="form-control" name="form[link]" value="<?php echo Html::encode($link->link);?>">
      </div>
      <div class="form-group">
        <label>封面图</label>
        <input type="text" class="form-control" name="form[thumbnail_url]" value="<?php echo Html::encode($link->thumbnail_url);?>">
      </div>
      <div class="form-group">
        <label>来源</label>
        <select class="form-control" name="form[source]">
          <option value=""></option>
          <?php foreach (JxDictionary::getItems('COURSE_BOOK_LINK_SOURCE') as $sourceValue => $sourceName ) : ?>
          <option value="<?php echo $sourceValue;?>" <?php if($sourceValue==$link->source):?>selected<?php endif;?> >
            <?php echo Html::encode($sourceName);?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="form-group">
        <label>价格</label>
        <input type="text" class="form-control" name="form[price]" value="<?php echo Html::encode($link->price);?>">
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>