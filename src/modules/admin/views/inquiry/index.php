<?php
use yii\helpers\Url;
use yii\helpers\Html;
/* @var \app\models\MdlInquiry[] $inquiries */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">咨询管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">咨询列表</h3>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">性名</th>
          <th scope="col">手机号</th>
          <th scope="col">QQ</th>
          <th scope="col">性别</th>
          <th scope="col">消息</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $inquiries as $inquiry ) : ?>
        <tr>
          <th scope="row"><?php echo $inquiry->id; ?></th>
          <td><?php echo Html::encode($inquiry->name); ?></td>
          <td><?php echo Html::encode($inquiry->phone); ?></td>
          <td><?php echo Html::encode($inquiry->qq); ?></td>
          <td><?php echo Html::encode($inquiry->sex); ?></td>
          <td><?php echo Html::encode($inquiry->message); ?></td>
          <td>
            <a href="<?php echo Url::to(['inquiry/delete','id'=>$inquiry->id]);?>" 
               onclick="return confirm('是否确定删除该咨询？');"
            ><i class="fas fa-trash-alt"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>