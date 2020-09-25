<?php 
use yii\helpers\Html;
use app\helpers\JxDictionary;
use yii\helpers\Url;
/* @var \app\models\MdlCourseTestQuestions $question */
?>
<?php if ( null === $question ): ?>
  暂无试题
 <?php return; ?>
<?php endif; ?>

<form action="<?php echo Url::to(['course/test-answer'])?>" method="post">
<?php if (JxDictionary::match('COURSE_TEST_QUESTION_TYPE', 'SINGLE_SELECTION', $question->type) ) :?>
  <div>
    <?php echo Html::encode($question->content); ?>
  </div>
  <div>
    <?php foreach ( json_decode($question->options, true) as $selection => $text ):?>
    <div class="radio">
      <label>
        <input type="radio" name="answer" value="<?php echo $selection; ?>">
        <?php echo $selection; ?>. <?php echo Html::encode($text); ?>
      </label>
    </div>
    <?php endforeach; ?>
  </div>
<?php elseif (JxDictionary::match('COURSE_TEST_QUESTION_TYPE', 'MULTI_SELECTION', $question->type) ) :?>
  <div>
    <?php echo Html::encode($question->content); ?>
  </div>
  <div>
    <?php foreach ( json_decode($question->options, true) as $selection => $text ):?>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="answer[]" value="<?php echo $selection; ?>">
        <?php echo $selection; ?>. <?php echo Html::encode($text); ?>
      </label>
    </div>
    <?php endforeach; ?>
  </div>
  <?php elseif (JxDictionary::match('COURSE_TEST_QUESTION_TYPE', 'SHORT_ANSWER', $question->type) ) :?>
    <div>
      <?php echo Html::encode($question->content); ?>
    </div>
    <div>
      <br>
      <textarea class="form-control" rows="3" name="answer"></textarea>
      <br>
    </div>
  <?php endif; ?>
  <input type="hidden" name="question" value="<?php echo $question->id; ?>">
  <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
  <button type="submit" class="btn btn-default">提交</button>
</form>
