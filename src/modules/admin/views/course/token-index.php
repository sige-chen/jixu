<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxDictionary;
/* @var \app\models\MdlCourses $course */
/* @var \app\models\MdlCoursePurchaseTokens[] $tokens */
?>
<ol class="admin-breadcrumb">
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['index/index']);?>">首页</a></li>
  <li class="breadcrumb-item"><a href="<?php echo Url::to(['course/index']);?>">课程管理</a></li>
  <li class="breadcrumb-item">密钥列表</li>
</ol>
<div class="card">
  <div class="card-header">
    <h3 class="card-title"><?php echo Html::encode($course->name); ?> 密钥列表</h3>
    <div class="card-tools">
      &nbsp;
      <a href="<?php echo Url::to(['course/token-generate','course'=>$course->id])?>" class="btn btn-tool" title="生成密钥">
        <i class="fas fa-redo-alt"></i>
      </a>
    </div>
  </div>
  <div class="card-body">
    <table class="table table-striped table-hover table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">生成者</th>
          <th scope="col">密钥</th>
          <th scope="col">状态</th>
          <th scope="col">操作</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ( $tokens as $token ) : ?>
        <tr>
          <th scope="row"><?php echo $token->id; ?></th>
          <td><?php echo Html::encode($token->getGenerator()->nickname); ?></td>
          <td><?php echo $token->token; ?></td>
          <td><?php echo JxDictionary::getItemValueName('COURSE_TOKEN_STATUS', $token->status); ?></td>
          <td></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>