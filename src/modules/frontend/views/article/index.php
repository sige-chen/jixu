<?php 
use app\modules\frontend\widgets\Banner;
use yii\base\Widget;
use yii\helpers\Url;
use yii\helpers\Html;
use app\models\MdlAdvertisements;
use app\modules\frontend\widgets\Pager;
/* @var \app\models\MdlArticles $articles */
/* @var mixed $query */
?>
<?php echo Banner::widget(['target'=>'company_news']); ?>
<div><br></div>
<div class="main">
  <div class="wp">
    <div class="col-l">
      <ul class="ul-imgtxt">
        <?php foreach ( $articles as $article ) : ?>
        <li>
          <div class="pic">
            <a href="<?php echo Url::to(['article/read', 'id'=>$article->id]); ?>">
              <img src="<?php echo $article->thumbnail_url?>">
            </a>
          </div>
          <div class="txt">
            <h3>
              <a href="<?php echo Url::to(['article/read', 'id'=>$article->id]); ?>">
                <?php echo Html::encode($article->title); ?>
              </a>
            </h3>
            <div><p><?php echo Html::encode($article->summary); ?></p></div>
            <span class="li-date"><?php echo $article->date; ?></span>
          </div>
        </li>
        <?php endforeach; ?>
      </ul>
      <?php echo Pager::widget(['query'=>$query]); ?>
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