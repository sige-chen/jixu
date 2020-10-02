<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var \app\models\MdlUsers[] $users */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">用户管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">用户列表</h3>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">邮箱</th>
          <th scope="col">昵称</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $users as $user ) : ?>
        <tr>
          <th scope="row"><?php echo $user->id; ?></th>
          <td><?php echo Html::encode($user->email); ?></td>
          <td><?php echo Html::encode($user->nickname); ?></td>
          <td></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>