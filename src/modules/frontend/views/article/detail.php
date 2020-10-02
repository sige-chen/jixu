<?php 
use yii\helpers\Html;
use app\models\MdlAdvertisements;

/* @var \app\models\MdlArticles $article */
?>
<div style="background-color: #efefef;">
  <div class="cur">
    <div class="wp">
      <span>您的位置:</span>
      <a href="javascript:;">首页</a>
      &nbsp;&gt;
      <a href="javascript:;"><?php echo Html::encode($article->title); ?></a>
    </div>
  </div>
  <div class="main">
    <div class="wp">
      <div class="col-l" style="width: 925px;">
        <div class="m-article1">
          <div class="news-tit">
            <h1><?php echo Html::encode($article->title); ?></h1>
          </div>
          <div class="txt"><?php echo $article->content; ?></div>
        </div>
      </div>
      <div class="col-r">
        <ul class="ul-crimg">
          <?php $ads = MdlAdvertisements::getAdList('ARTICLE_LIST_RIGHT'); ?>
          <?php foreach ( $ads as $ad ): ?>
          <li>
            <a href="<?php echo $ad->target_url; ?>">
              <img src="<?php echo $ad->image_url; ?>" alt="<?php echo Html::encode($ad->title); ?>">
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>