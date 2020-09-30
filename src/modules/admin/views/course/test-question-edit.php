<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Alert;
use app\helpers\JxDictionary;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseTests $test */
/* @var \app\models\MdlCourseTestQuestions $question */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/test-index', 'course'=>$course->id]);?>"></a>试题管理</li>
  <li class="breadcrumb-item">试卷编辑</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">试题编辑</h3>
  </div>
  <div class="card-body">
  <?php echo Alert::widget();?>
    <form method="post" action="<?php echo Url::to(['course/test-question-save']);?>">
      <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
      <input type="hidden" name="id" value="<?php echo $question->id; ?>">
      <input type="hidden" name="form[course_id]" value="<?php echo $test->course_id; ?>">
      <input type="hidden" name="form[test_id]" value="<?php echo $test->id; ?>">
      
      <div class="form-group">
        <label>编号</label>
        <input type="number" class="form-control" name="form[index]" value="<?php echo Html::encode($question->index);?>">
      </div>
      
      <div class="form-group">
        <label>类型</label>
        <select class="form-control" name="form[type]" onchange="onQuestionTypeChange()">
          <?php foreach ( JxDictionary::getItems('COURSE_TEST_QUESTION_TYPE') as $tKey => $tName ) : ?>
          <option value="<?php echo $tKey?>" <?php if($tKey == $question->type):?>selected<?php endif;?> >
            <?php echo Html::encode($tName)?>
          </option>
          <?php endforeach; ?>
        </select>
      </div>
      
      <div class="form-group">
        <label>内容</label>
        <textarea class="form-control" name="form[content]"><?php echo Html::encode($question->content);?></textarea>
      </div>
      
      <div class="form-group" id="grp-options">
        <label>选项</label>
        <div id="con-option-list"></div>
        <button type="button" class="btn btn-default btn-xs" style="margin-top:10px;" onclick="addNewOption(null)">添加选项</button>
      </div>
      
      <div class="form-group">
        <label>参考答案</label>
        <textarea class="form-control" name="form[answer]"><?php echo Html::encode($question->answer);?></textarea>
        <small id="emailHelp" class="form-text text-muted">选择题参考答案填写选项， 多选按英文逗号“,”分割</small>
      </div>
      
      <div class="form-group">
        <label>提示</label>
        <textarea class="form-control" name="form[tip]"><?php echo Html::encode($question->tip);?></textarea>
      </div>
      <button type="submit" class="btn btn-primary">保存</button>
    </form>
  </div>
</div>
<script type="text/template" id="tmpl-option">
<div class="input-group" style="margin-bottom: 10px;" id="opt-{{INDEX}}">
  <div class="input-group-prepend">
    <input type="text" class="form-control" name="options[{{INDEX}}][key]" value="{{KEY}}">
  </div>
  <input type="text" class="form-control" name="options[{{INDEX}}][value]" value="{{VALUE}}">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" onclick="removeOption({{INDEX}})">
      <i class="fas fa-trash-alt"></i>
    </button>
  </div>
</div>
</script>
<script>
// 选项索引
var optionIndex = 0;
// 添加选项
function addNewOption(option) {
  optionIndex ++;
  if ( null == option ) {
    option = {key:'',value:''};
  }
  option.index = optionIndex;

  var tmpl = $('#tmpl-option').text()
    .replace(/{{INDEX}}/g, option.index)
    .replace(/{{KEY}}/g, option.key)
    .replace(/{{VALUE}}/,option.value);
  $(tmpl).appendTo('#con-option-list');
}
// 删除选项
function removeOption( index ) {
  $("#opt-"+index).remove();
}
// 问题类型变更
function onQuestionTypeChange() {
  var type = $('[name="form[type]"]').val();
  if ( type == <?php echo JxDictionary::value('COURSE_TEST_QUESTION_TYPE', 'SINGLE_SELECTION'); ?> 
    || type == <?php echo JxDictionary::value('COURSE_TEST_QUESTION_TYPE', 'MULTI_SELECTION'); ?>
  ) {
    $('#grp-options').show();
  } else {
    $('#grp-options').hide();
  }
}
<?php foreach ( json_decode($question->options, true) as $key => $value ) :?>
addNewOption({
  key : <?php echo json_encode($key); ?>,
  value : <?php echo json_encode($value); ?>,
});
<?php endforeach; ?>
</script>