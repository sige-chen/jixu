<?php 
use yii\helpers\Html;
use app\helpers\JxDictionary;

/* @var \app\modules\admin\widgets\FormDictSelectField $widget */
?>
<div class="form-group">
  <label><?php echo Html::encode($widget->label); ?></label>
  <select class="form-control" name="<?php echo $widget->name; ?>">
    <?php foreach (JxDictionary::getItems($widget->dictGroup) as $dictKey => $dictValue ) :?>
    <option value="<?php echo $dictKey; ?>" <?php if($dictKey == $widget->value) :?>selected<?php endif; ?>>
      <?php echo Html::encode($dictValue); ?>
    </option>
    <?php endforeach; ?>
  </select>
</div>