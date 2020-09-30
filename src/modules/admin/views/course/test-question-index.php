<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxDictionary;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseTests $test */
/* @var \app\models\MdlCourseTestQuestions[] $questions */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/test-index', 'course'=>$course->id]);?>"></a>试题管理</li>
  <li class="breadcrumb-item">试题列表</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo Html::encode($course->name); ?> 试题列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['course/test-question-edit','test'=>$test->id])?>" class="btn btn-tool" title="添加试题"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">
    <?php foreach ( $questions as $question ) : ?>
    <div>
      <strong>
        <?php printf('%02d', $question->index); ?>.
        <?php echo Html::encode(JxDictionary::getItemValueName('COURSE_TEST_QUESTION_TYPE', $question->type));?>
      </strong>
      &nbsp;&nbsp;
      <a href="<?php echo Url::to(['course/test-question-edit','test'=>$question->test_id,'id'=>$question->id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
      &nbsp;&nbsp;
      <a href="<?php echo Url::to(['course/test-question-delete','id'=>$question->id]);?>" onclick="return confirm('是否确定删除该试题？');"><i class="fa fa-trash"></i></a>
      
      <p><?php echo Html::encode($question->content); ?></p>
      <p>
      <?php if ( JxDictionary::match('COURSE_TEST_QUESTION_TYPE', ['SINGLE_SELECTION','MULTI_SELECTION'], $question->type)) :?>
        <?php foreach ( json_decode($question->options, true) as $key => $value ) :?>
          <strong><?php echo $key; ?>.</strong> <?php echo Html::encode($value);?> &nbsp;&nbsp;&nbsp;
        <?php endforeach;?>
      <?php endif; ?>
      </p>
      <p>参考答案：<?php echo Html::encode($question->answer); ?></p>
      <p>提示：<?php echo Html::encode($question->tip); ?></p>
      <hr>
    </div>
    <?php endforeach; ?>
  </div>
</div>