<?php 
use yii\helpers\Html;
use yii\helpers\Url;

/* @var \app\models\MdlCourses[] $list */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item active">Starter Page</li>
</ol>

<div class="card">
  <div class="card-header">
    <h3 class="card-title">课程列表</h3>
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
          <td>销售中</td>
          <td>购买:10 在线:在线 资源:10</td>
          <td>
            <?php echo $course->videoCollectionCount; ?>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/video-collection-index','course'=>$course->id])?>"
            ><i class="fa fa-list" aria-hidden="true"></i>
          </td>
          <td>0</td>
          <td>12</td>
          <td>2020-01-01</td>
          <td>
            <a href="<?php echo Url::to(['/frontend/course/index/index','id'=>$course->id]);?>" target="_blank"
            ><i class="fa fa-share" aria-hidden="true"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['course/edit','id'=>$course->id]);?>"><i class="fa fa-edit" aria-hidden="true"></i>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
        
        
        
        
        
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">视频</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">教材</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">..22222.</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">.33..</div>
</div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>






<!-- Modal -->
<div class="modal fade" id="mdl-course-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
        
        
        
        <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
        
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>