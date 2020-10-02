<?php
use yii\helpers\Url;
/* @var \app\modules\admin\widgets\FormFileUploadField $widget */
?>
<div class="input-group mb-3">
  <input type="file" class="form-control" name="file" id="input-file">
  <div class="input-group-append" class="file-upload-status">
    <span class="input-group-text" id="file-status">
      <i class="fas fa-ellipsis-h"></i>
    </span>
  </div>
</div>
<script>
$(document).ready(function() {
  $("#input-file").AjaxFileUpload({
    action : '<?php echo Url::to(['resource/upload', 'type'=>$widget->type]); ?>',
    onChange : function() {
      $('#file-status').html('<i class="fas fa-hourglass-start"></i>');
    },
    onSubmit : function() {
      $('#file-status').html('<div class="spinner-border" role="status" style="height:1rem;width:1rem;"></div>');
    },
    onComplete: function(filename, response) {
      $("#input-file").attr('disabled', 'disabled');
      if ( false == response.success ) {
        alert(response.message);
        $('#file-status').html('<i class="fas fa-exclamation-triangle"></i>');
        return false;
      }
      $('<?php echo $widget->saveUrlTo; ?>').val(response.data.url);
      $('#file-status').html('<i class="fas fa-check"></i>');
      <?php if ( null !== $widget->preViewImage ) :?>
      $('<?php echo $widget->preViewImage?>').attr('src', response.data.url);
      <?php endif; ?>
    }
  });
});
</script>