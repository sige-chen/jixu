<?php 
use yii\helpers\Html;
use yii\helpers\Url;
/* @var \app\models\MdlCourseVideos[] $videos */
/* @var \app\models\MdlCourseVideoCollections $collection */
/* @var \app\models\MdlCourses $course */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/video-collection-index','course'=>$course->id]);?>">视频合集管理</a></li>
  <li class="breadcrumb-item">视频列表</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo Html::encode($collection->title); ?> 视频列表</h3>
    <div class="card-tools">
      <a href="<?php echo Url::to(['course/video-edit','collection'=>$collection->id])?>" class="btn btn-tool" title="上传视频">
        <i class="fas fa-upload"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">标题</th>
          <th scope="col">时长</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $videos as $video ) : ?>
        <tr>
          <th scope="row"><?php echo $video->index; ?></th>
          <td><?php echo Html::encode($video->title); ?></td>
          <td><?php printf('%02d', ($video->length-($video->length%60))/60); ?>:<?php printf("%02d",$video->length%60);?></td>
          <td>
            <a href="<?php echo Url::to(['course/video-delete','id'=>$video->id]);?>" onclick="return confirm('是否确定删除该视频？');"><i class="fas fa-trash-alt"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/video-edit','id'=>$video->id,'collection'=>$video->collection_id]);?>"><i class="fa fa-edit"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>