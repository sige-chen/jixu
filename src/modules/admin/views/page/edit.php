<?php
use yii\helpers\Url;
use app\modules\admin\assets\AdminAsset;
use yii\helpers\Html;
use app\widgets\Alert;
use yii\base\Widget;
use app\helpers\JxDictionary;
/* @var \app\models\MdlPage $page */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['page/index'])?>">页面管理</a></li>
  <li class="breadcrumb-item">页面编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">页面编辑</h3>
  </div>
  <div class="card-body">
    <?php echo Alert::widget(); ?>
    <form method="post" action="<?php echo Url::to(['page/save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $page->id; ?>">
      <input type="hidden" name="form[edit_mode]" value="<?php echo $page->edit_mode;?>">
      <div class="form-group">
        <label>名称</label>
        <input type="text" class="form-control" name="form[name]" value="<?php echo Html::encode($page->name);?>">
      </div>
      <div class="form-group">
        <label>标题</label>
        <input type="text" class="form-control" name="form[title]" value="<?php echo Html::encode($page->title);?>">
      </div>
      <div class="form-group">
        <label>
          <span>内容</span>
          &nbsp;&nbsp;&nbsp;
          <?php if (JxDictionary::match('PAGE_EDIT_MODE', 'SRC', $page->edit_mode) ): ?>
          <small><a href="<?php echo Url::to(['page/edit','id'=>$page->id, 'mode'=>JxDictionary::value('PAGE_EDIT_MODE', 'DOC')]); ?>">&gt; 文档模式</a></small>
          <?php elseif (JxDictionary::match('PAGE_EDIT_MODE', 'DOC', $page->edit_mode) ): ?>
          <small><a href="<?php echo Url::to(['page/edit','id'=>$page->id, 'mode'=>JxDictionary::value('PAGE_EDIT_MODE', 'SRC')]); ?>">&gt; 源码模式</a></small>
          <?php endif; ?>
        </label>
        <textarea id="page-content" name="form[content]" class="form-control"><?php echo Html::encode($page->content);?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<?php if (JxDictionary::match('PAGE_EDIT_MODE', 'SRC', $page->edit_mode) ): ?>
<link rel="stylesheet" href="<?php echo AdminAsset::getResUrl('lib/codemirror/lib/codemirror.css'); ?>">
<script src="<?php echo AdminAsset::getResUrl('lib/codemirror/lib/codemirror.js'); ?>"></script>
<script>
var editor = CodeMirror.fromTextArea(document.getElementById("page-content"), {
  lineNumbers: true,
  mode: "htmlmixed",
});
</script>
<?php elseif (JxDictionary::match('PAGE_EDIT_MODE', 'DOC', $page->edit_mode)): ?>
<link rel="stylesheet" href="<?php echo AdminAsset::getResUrl('plugins/summernote/summernote-bs4.css'); ?>">
<script src="<?php echo AdminAsset::getResUrl('plugins/summernote/summernote-bs4.min.js'); ?>"></script>
<script type="text/javascript">
$(function () {$('#page-content').summernote()});
</script>
<?php endif; ?>