<?php 
use yii\helpers\Url;
use yii\helpers\Html;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseBookAttachments[] $attachments */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item">教材附件管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo Html::encode($course->name); ?> 教材购买链接列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['course/book-attach-edit','course'=>$course->id])?>" class="btn btn-tool" title="添加附件"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">标题</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $attachments as $attachment ) : ?>
        <tr>
          <th scope="row"><?php echo $attachment->id; ?></th>
          <td><?php echo Html::encode($attachment->name); ?></td>
          <td>
            <a href="<?php echo Url::to(['course/book-attach-delete','id'=>$attachment->id]);?>" 
               onclick="return confirm('是否确定删除该附件？');"
            ><i class="fas fa-trash-alt"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/book-attach-edit','id'=>$attachment->id,'course'=>$attachment->course_id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>