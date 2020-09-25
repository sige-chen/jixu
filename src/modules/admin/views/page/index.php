<?php 
use yii\helpers\Html;
use yii\helpers\Url;
/* @var \app\models\MdlPage[] $pages */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">页面管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">页面列表</h3>
    <div class="card-tools">
      <a href="<?php echo Url::to(['page/edit'])?>" class="btn btn-tool" title="新建页面">
        <i class="fas fa-plus"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">名称</th>
          <th scope="col">标题</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $pages as $page ) : ?>
        <tr>
          <th scope="row"><?php echo $page->id; ?></th>
          <td><?php echo Html::encode($page->name); ?></td>
          <td><?php echo Html::encode($page->title); ?></td>
          <td>
            <a href="<?php echo Url::to(['page/delete','id'=>$page->id]);?>" onclick="return confirm('是否确定删除该页面？');"><i class="fas fa-trash-alt"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['page/edit','id'=>$page->id]);?>"><i class="fa fa-edit"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['/frontend/page/show','name'=>$page->name]);?>" target="_blank"
            ><i class="fa fa-share" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>