<?php
use yii\helpers\Url;
?>
<div style="padding-top: 20%;">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <form action="<?php echo Url::to(['index/demo']); ?>" method="post">
          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <div class="input-group">
            <span class="input-group-addon">体验码</span>
            <input type="password" class="form-control" name="code">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit">进入</button>
            </span>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<style>
html, body {height:100%;}
body {background: #e5e5e5;}
</style>