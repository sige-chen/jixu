<?php 
use yii\helpers\Url;

/* @var \app\models\MdlCourses $course */
?>
<div class="container">
  <div style="padding: 50px;border: solid silver 1px;margin: 50px 0;background-color: #f7f7f7;">
    <div style="float:right;">
      <img src="<?php echo $course->thumbnail_url;?>" style="max-width: 300px;">
    </div>
    <div>
      <h1>1. 淘宝购买密钥</h1>
      <a href="<?php echo $course->taobao_link; ?>" target="_blank" style="display: block;background: #ff5555;color: white;padding: 10px;width: 250px;border-radius: 10px;padding-left: 20px;margin: 20px 0 20px 40px;">
        <span class="glyphicon glyphicon-hand-right"></span> 去淘宝购买
      </a>
    </div>
    <div>
      <h1>2. 输入课程密钥</h1>
      <div>
        <form action="<?php echo Url::to(['course/purchase-save']); ?>" method="post">
          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <input type="hidden" name="course" value="<?php echo $course->id; ?>">
          <input type="text" name="token" style="display: block;width: 500px;height: 50px;font-size: 24px;color: #c4c4c4;padding: 10px;border: solid #dedede 1px;margin-left: 40px;margin-top: 20px;">
          <button type="submit" class="btn btn-default" style="margin-left: 40px;margin-top: 20px;">确认</button>
        </form>
      </div>
    </div>
  </div>
</div>