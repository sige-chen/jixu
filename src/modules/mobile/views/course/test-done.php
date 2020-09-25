<?php 
use yii\helpers\Html;
use app\helpers\JxDictionary;

/* @var \app\models\MdlCourseTestQuestions[] $questions */
/* @var array $myAnswers */
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php foreach ( $questions as $question ) : ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading-<?php echo $question->id;?>">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $question->id;?>" aria-expanded="true" aria-controls="collapseOne">
          <?php printf('%02d', $question->index+1); ?>. 
        </a>
      </h4>
    </div>
    <div id="collapse-<?php echo $question->id;?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <p>
          <span>参考回答：</span>
          <?php if ( JxDictionary::match('COURSE_TEST_QUESTION_TYPE', 'MULTI_SELECTION', $question->type) ) : ?>
            <?php echo Html::encode(implode(',', json_decode($question->answer, true))); ?>
          <?php else : ?>
            <?php echo Html::encode($myAnswers[$question->index]);?>
          <?php endif; ?>
        </p>
        <p>
          <span>我的回答：</span>
          <?php if ( JxDictionary::match('COURSE_TEST_QUESTION_TYPE', 'MULTI_SELECTION', $question->type) ) : ?>
            <?php echo Html::encode(implode(',', $myAnswers[$question->index])); ?>
          <?php else : ?>
            <?php echo Html::encode($myAnswers[$question->index]);?>
          <?php endif; ?>
        </p>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>