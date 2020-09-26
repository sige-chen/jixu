<?php 
use yii\helpers\Url;
use yii\helpers\Html;
/* @var \app\models\MdlCourse $course */
/* @var \app\models\MdlCourseVideoCollections[] $collections */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item">视频合集管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo Html::encode($course->name); ?> 视频集列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['course/video-collection-edit','course'=>$course->id])?>" class="btn btn-tool" title="新建合集"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">名称</th>
          <th scope="col">视频数量</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $collections as $collection ) : ?>
        <tr>
          <th scope="row"><?php echo $collection->id; ?></th>
          <td><?php echo Html::encode($collection->title); ?></td>
          <td>
            <?php echo $collection->videoCount; ?>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/video-index','collection'=>$collection->id])?>"
            ><i class="fa fa-list" aria-hidden="true"></i></a>
          </td>
          <td>
            <a href="<?php echo Url::to(['course/video-collection-delete','id'=>$collection->id]);?>" onclick="return confirm('是否确定删除该视频合集？');"><i class="fas fa-trash-alt"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/video-collection-edit','id'=>$collection->id,'course'=>$collection->course_id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>