<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\helpers\JxDictionary;
/* @var \app\models\MdlCourses[] $list */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">课程管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">课程列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['course/edit'])?>" class="btn btn-tool" title="新建课程"><i class="fas fa-plus"></i></a>
    </div>
    
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">名称</th>
          <th scope="col">状态</th>
          <th scope="col">教材</th>
          <th scope="col">视频集</th>
          <th scope="col">收藏人数</th>
          <th scope="col">购买人数</th>
          <th scope="col">上架时间</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $list as $course ) : ?>
        <tr>
          <th scope="row"><?php echo $course->id; ?></th>
          <td><?php echo Html::encode($course->name); ?></td>
          <td>
            <a href="javascript:;" onclick="onCourseStatusClicked(this)" 
               data-id="<?php echo $course->id;?>" 
               data-status="<?php echo $course->status;?>"
               data-title="<?php echo Html::encode($course->name); ?>"
            >
              <?php echo Html::encode(JxDictionary::getItemValueName('COURSE_STATUS', $course->status));?>
              <i class="fas fa-caret-down"></i>
            </a>
          </td>
          <td>
            <a href="<?php echo Url::to(['course/book-link-index','course'=>$course->id]);?>">
              <i class="fa fa-shopping-cart"></i>
              <?php echo $course->bookLinkCount;?>
            </a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/book-online-edit','course'=>$course->id]);?>">
              <i class="fa fa-file"></i>
              <?php echo $course->hasOnlineBook ? 'ON' : 'OFF'; ?>
            </a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/book-attach-index','course'=>$course->id]);?>">
              <i class="fa fa-paperclip"></i>
              <?php echo $course->bookAttachmentCount ; ?>
            </a>
           </td>
          <td>
            <a href="<?php echo Url::to(['course/video-collection-index','course'=>$course->id])?>"
            ><i class="fa fa-list"></i> <?php echo $course->videoCollectionCount; ?></a>
          </td>
          <td><?php echo $course->userCollectionCount; ?></td>
          <td><?php echo $course->userPurchaseCount;?></td>
          <td><?php echo $course->published_at; ?></td>
          <td>
            <a href="<?php echo Url::to(['course/token-index','course'=>$course->id]);?>"
            ><i class="fas fa-passport"></i></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/delete','course'=>$course->id]);?>"
               onclick="return confirm('是否确定删除该课程？');"
            ><i class="fa fa-trash"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['/frontend/course/detail','id'=>$course->id]);?>" target="_blank"
            ><i class="fa fa-share" aria-hidden="true"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/edit','id'=>$course->id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- 状态变更弹框 -->
<div class="modal" tabindex="-1" id="modal-status-change">
  <div class="modal-dialog">
    <form action="<?php echo Url::to(['course/status-change']);?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">课程状态变更</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="msc-id" value="">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
        <div class="form-group">
          <label>课程</label>
          <input type="text" class="form-control" id="txt-title" disabled>
        </div>
        <div class="form-group">
          <label>状态</label>
          <select class="form-control" name="msc-status">
            <?php foreach ( JxDictionary::getItems('COURSE_STATUS') as $statusKey => $statusValue ) : ?>
            <option value="<?php echo $statusKey; ?>"><?php echo $statusValue; ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="submit" class="btn btn-primary">保存</button>
      </div>
    </div>
    </form>
  </div>
</div>

<script>
/** 弹出状态变更弹框 */
function onCourseStatusClicked( item ) {
  $('[name="msc-id"]').val($(item).attr('data-id'));
  $('[name="msc-status"]').val($(item).attr('data-status'));
  $('#txt-title').val($(item).attr('data-title'));
  $('#modal-status-change').modal('show');
}
</script>