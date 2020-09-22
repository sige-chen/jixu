<?php
use yii\helpers\Url;
use app\models\MdlCourses;
use app\models\MdlUsers;
?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?php echo MdlCourses::getOnSellCount(); ?></h3>
          <p>课程</p>
        </div>
        <div class="icon">
          <i class="far fa-file-alt"></i>
        </div>
        <a href="<?php echo Url::to(['course/index']);?>" class="small-box-footer">更多课程 <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    
    <div class="col-md-3">
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?php echo MdlUsers::getAvailableCount(); ?></h3>
          <p>用户</p>
        </div>
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <a href="#" class="small-box-footer">更多用户 <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
</div>



