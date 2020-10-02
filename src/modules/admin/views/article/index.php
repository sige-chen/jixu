<?php
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxDictionary;
/* @var \app\models\MdlArticles[] $atricles */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item">文章管理</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">文章列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['article/edit'])?>" class="btn btn-tool" title="添加文章"><i class="fas fa-plus"></i></a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">类型</th>
          <th scope="col">标题</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $atricles as $atricle ) : ?>
        <tr>
          <th scope="row"><?php echo $atricle->id; ?></th>
          <td><?php echo Html::encode(JxDictionary::getItemValueName('ARTICLE_TYPE', $atricle->type)); ?></td>
          <td><?php echo Html::encode($atricle->title); ?></td>
          <td>
            <a href="<?php echo Url::to(['article/delete','id'=>$atricle->id]);?>" 
               onclick="return confirm('是否确定删除该文章？');"
            ><i class="fas fa-trash-alt"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['article/edit','id'=>$atricle->id]);?>"><i class="fa fa-edit" aria-hidden="true"></i></a>
            &nbsp;&nbsp;
            <a href="<?php echo Url::to(['/frontend/article/detail','id'=>$atricle->id]);?>" target="_blank"><i class="fa fa-share" aria-hidden="true"></i></a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>