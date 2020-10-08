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
      $('#wdg-fileupload').modal('show');
    },
    onComplete: function(filename, response) {
      setTimeout(function(){$('#wdg-fileupload').modal('hide');}, 100);
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
      <?php if ( null !== $widget->previewVideo ) :?>
      $('<?php echo $widget->previewVideo?>').attr('src', response.data.url);
      <?php endif; ?>
      <?php echo $widget->onComplete; ?>
    }
  });
});
</script>

<!-- 文件上传弹框  -->
<div class="modal fade" id="wdg-fileupload" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header"></div>
      <div class="modal-body" style="text-align: center;color: #888888;">
        <i class="fas fa-2x fa-sync fa-spin"></i>
      </div>
      <div class="modal-footer"></div>
    </div>
  </div>
</div>