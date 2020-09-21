<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxDictionary;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCourseBookLinks $links */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item">教材链接管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo Html::encode($course->name); ?> 教材购买链接列表</h3>
    <div class="card-tools">
      <a href="<?php echo Url::to(['course/book-link-edit','course'=>$course->id])?>" class="btn btn-tool" title="添加链接"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">标题</th>
          <th scope="col">来源</th>
          <th scope="col">价格</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $links as $link ) : ?>
        <tr>
          <th scope="row"><?php echo $link->id; ?></th>
          <td><?php echo Html::encode($link->title); ?></td>
          <td> <?php echo JxDictionary::getItemValueName('COURSE_BOOK_LINK_SOURCE', $link->source); ?></td>
          <td><?php echo Html::encode($link->price); ?></td>
          <td>
            <a href="<?php echo Url::to(['course/book-link-delete','id'=>$link->id]);?>" 
               onclick="return confirm('是否确定删除该链接？');"
            ><i class="fas fa-trash-alt"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/book-link-edit','id'=>$link->id,'course'=>$link->course_id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>