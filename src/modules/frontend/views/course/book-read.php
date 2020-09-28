<?php 
use yii\helpers\Url;

/* @var \app\models\MdlCourses $course */
?>
<div class="col-md-9" style="background: white;padding: 0;box-shadow: 5px 5px 5px 0px #e7e7e7;">
  <iframe src="<?php echo Url::to(['course/book-pdf-viewer', 'file'=>$course->online_book_url]);?>" style="width: 100%;border: none;height: 800px;"></iframe>
</div>
<div class="col-md-3" style="padding-right: 0;">
  <div id="note-list" style="background: white;padding: 20px;box-shadow: 5px 5px 5px 0px #e7e7e7;padding-bottom: 10px;">
    <span id="note-empty-mark">暂无笔记</span>
  </div>
  
  <div class="input-group">
      <input type="text" class="form-control" placeholder="记一笔" style="border-radius: 0;" id="note-content">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button" style="border-radius: 0;" onclick="onBtnSaveNoteClicked()">
          <span class="glyphicon glyphicon-send" aria-hidden="true"></span>
        </button>
      </span>
   </div>
</div>
<script>
/** 页码编号 */
var page = 0;

/** 渲染笔记 */
function renderNotes( note ) {
  $('<div>').addClass('note').text(note.content).appendTo('#note-list');
  $('#note-empty-mark').hide();
}

/** 保存笔记 */
function onBtnSaveNoteClicked() {
  $.post('<?php echo Url::to(['course/book-note-save']);?>',{
    <?= Yii::$app->request->csrfParam; ?> : '<?= Yii::$app->request->getCsrfToken();?>',
    data : {
      course_id : <?php echo $course->id; ?>,
      page : page,
      content : $('#note-content').val(),
    }
  }, function ( response ) {
    renderNotes(response.data);
    $('#note-content').val('');
  }, 'json');
}

/** 加载笔记 */
function onPdfPageChange( event ) {
  $('.note').remove();
  $('#note-empty-mark').show();
  page = event.pageNumber;
  $.get('<?php echo Url::to(['course/book-note-load']); ?>', {
    course : <?php echo $course->id; ?>,
    page : page,
  }, function( response ) {
    for ( var i in response.data ) {
      renderNotes(response.data[i]);
    }
  }, 'json');
}
</script>
<style>
#note-empty-mark {
      display: block;
    text-align: center;
    font-size: 16px;
    color: #b7b7b7;
      line-height: 50px;
}
.note {
  margin-bottom: 10px;
    padding: 6px 0;
    border-top: solid #d8d8d8 1px;
    border-bottom: solid #d8d8d8 1px;
    color: #6d6d6d;
}
</style>