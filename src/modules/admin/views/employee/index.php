<?php
use yii\helpers\Url;
use yii\bootstrap\Html;
use app\helpers\JxDictionary;
/* @var \app\models\MdlAdminUsers[] $admins */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">职员管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">职员列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['employee/edit'])?>" class="btn btn-tool" title="添加职员"><i class="fas fa-plus"></i></a>
    </div>
    
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">用户名</th>
          <th scope="col">邮箱</th>
          <th scope="col">姓名</th>
          <th scope="col">类型</th>
          <th scope="col">职位</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $admins as $admin ) : ?>
        <tr>
          <th scope="row"><?php echo $admin->id; ?></th>
          <td><?php echo Html::encode($admin->username); ?></td>
          <td><?php echo Html::encode($admin->email); ?></td>
          <td><?php echo Html::encode($admin->nickname); ?></td>
          <td><?php echo Html::encode(JxDictionary::getItemValueName('ADMIN_USER_TYPE', $admin->type)); ?></td>
          <td><?php echo Html::encode($admin->title); ?></td>
          <td>
            <a href="<?php echo Url::to(['employee/delete','admin'=>$admin->id]);?>"
               onclick="return confirm('是否确定删除该职员？');"
            ><i class="fa fa-trash"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['employee/edit','admin'=>$admin->id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>