<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxDictionary;
/* @var \app\models\Mdlpartners[] $partners */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">合作方管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">合作方列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['partner/edit'])?>" class="btn btn-tool" title="添加合作方"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">类型</th>
          <th scope="col">名称</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $partners as $partner ) : ?>
        <tr>
          <th scope="row"><?php echo $partner->id; ?></th>
          <td><?php echo Html::encode(JxDictionary::getItemValueName('COMPANY_PART_TYPE', $partner->type)); ?></td>
          <td><?php echo Html::encode($partner->name); ?></td>
          <td>
            <a href="<?php echo Url::to(['partner/delete','id'=>$partner->id]);?>" 
               onclick="return confirm('是否确定删除该合作方？');"
            ><i class="fas fa-trash-alt"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['partner/edit','id'=>$partner->id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>