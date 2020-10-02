<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\helpers\JxConfiguration;
use app\modules\frontend\assets\FrontendAsset;
/* @var array $banners */
/* @var array $notis */
/* @var array $courses */
/* @var array $teachers */
/* @var array $partComs */
/* @var array $partSchools */
?>
<?php if ( !empty($banners) ) : ?>
<div class="banner">
  <?php foreach ( $banners as $banner ) : ?>
  <div class="item" style="background-image: url(<?php echo $banner->image_url;?>);">
    <a href="<?php echo $banner->target_url; ?>"​></a>
  </div>
  <?php endforeach; ?>
</div>
<?php endif; ?>

<?php if ( !empty($notis) ) :?>
<div class="notice" id="notice">
  <div class="container">
    <div class="notice_list">
      <ul>
        <li>
          <div id="gongao">
            <div style="width:1150px;height:40px;margin:0 auto;white-space: nowrap;overflow:hidden;" id="scroll_div" class="scroll_div">
              <div id="scroll_begin">
                <?php foreach ( $notis as $noti ) :?>
                <a href="<?php echo Url::to(['article/detail','id'=>$noti->id]); ?>"​ class="zxUrl">
                  <b><?php echo Html::encode($noti->title); ?></b>
                </a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php endforeach; ?>
              </div>
              <div id="scroll_end"></div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<?php endif; ?>

<div class="main-ind">
  <div class="row-ind1">
    <div class="wp">
      <div class="row">
        <ul class="ul-pic1">
          <li>
            <a href="javascript:;" class="item" style="background-image: url(<?php echo FrontendAsset::getResUrl('images/pic1-1.png'); ?>);">
              <h4>01</h4>
              <p>小班教学<br>全程面授</p>
            </a>
          </li>
          <li>
            <a href="javascript:;" class="item" style="background-image: url(<?php echo FrontendAsset::getResUrl('images/pic1-2.png'); ?>);">
              <h4>02</h4>
              <p>大牛导师</p>
            </a>
          </li>
          <li>
            <a href="javascript:;" class="item" style="background-image: url(<?php echo FrontendAsset::getResUrl('images/pic1-3.png'); ?>);">
              <h4>03</h4>
              <p>项目实践</p>
            </a>
          </li>
          <li>
            <a href="javascript:;" class="item" style="background-image: url(<?php echo FrontendAsset::getResUrl('images/pic1-4.png'); ?>);">
              <h4>04</h4>
              <p>直通名企</p>
            </a>
          </li>
          <li>
            <a href="javascript:;"​ class="item" style="background-image: url(<?php echo FrontendAsset::getResUrl('images/pic1-5.png'); ?>);">
              <h4>05</h4>
              <p>就业保障</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
  
  <div class="row-ind2">
    <div class="wp">
      <div class="row">
        <?php if ( !empty($course) ) : ?>
        <h3 class="tit-h3" style="text-align: center;">我们的课程不特别，<span>但很优秀</span></h3>
        <div>
          <?php foreach ( $courses as $course ) :?>
          <div style="width: 50%;float: left;">
            <a href="<?php echo Url::to(['course/detail','id'=>$course->id]);?>">
              <div style="background-image:url(<?php echo $course->thumbnail_url;?>);height: 350px;margin: 10px;border-radius: 10px;background-size: 100% 100%;"></div>
            </a>
          </div>
          <?php endforeach; ?>
          <div class="clear"></div>
        </div>
        <?php endif; ?>
        
        <?php if ( !empty($teachers) ) : ?>
        <h3 class="tit-h3">我们的老师不止专业，<span>还都是大牛</span></h3>
        <div class="slick-ind1">
          <?php foreach ( $teachers as $teacher ) : ?>
          <a class="item" href="javascript:;"​>
            <img src="<?php echo $teacher->photo_url; ?>" alt="<?php echo Html::encode($teacher->nickname); ?>">
            <div class="txt">
              <h5>
                <?php echo Html::encode($teacher->nickname); ?>
                <span><?php echo Html::encode($teacher->title); ?></span>
              </h5>
              <p><?php echo Html::encode($teacher->introduction); ?></p>
            </div>
          </a>
          <?php endforeach; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="wp">
      <div class="row">
        <!-- 首页文章动态 -->
        <div class="news-ind">
          <div class="col-l">
            <?php if (!empty($articleAboutComList)) : ?>
            <h3 class="tit-h3"><span>了解<?php echo JxConfiguration::get('COMPANY_SHORT_NAME', ''); ?></span></h3>
            <div class="hot">
              <?php $articleAboutCom = array_shift($articleAboutComList); ?>
              <div class="news-pic">
                <div class="img">
                  <a href="<?php echo Url::to(['article/detail','id'=>$articleAboutCom->id]);?>"​>
                    <img src="<?php echo $articleAboutCom->thumbnail_url; ?>" alt="<?php echo Html::encode($articleAboutCom->title); ?>">
                  </a>
                </div>
                <div class="txt">
                  <h5>
                    <a href="<?php echo Url::to(['article/detail','id'=>$articleAboutCom->id]);?>"​>
                      <?php echo Html::encode($articleAboutCom->title); ?>
                    </a>
                  </h5>
                  <p><?php echo Html::encode($articleAboutCom->summary); ?></p>
                </div>
              </div>
            </div>
            <ul class="list">
              <?php foreach ( $articleAboutComList as $articleAboutCom ) : ?>
              <li>
                <span class="time"><?php echo $articleAboutCom->date; ?></span>
                <a href="<?php echo Url::to(['article/detail','id'=>$articleAboutCom->id]);?>"​>
                  <?php echo Html::encode($articleAboutCom->title); ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
          <div class="col-r">
            <?php if (!empty($articleAboutNewsList)) : ?>
            <h3 class="tit-h3"><span>想了解世界</span></h3>
            <div class="hot">
              <?php $articleAboutNews = array_shift($articleAboutNewsList); ?>
              <div class="news-img">
                <a href="<?php echo Url::to(['article/detail','id'=>$articleAboutNews->id]);?>"​>
                  <img src="<?php echo $articleAboutNews->thumbnail_url; ?>" alt="<?php echo Html::encode($articleAboutNews->title); ?>">
                  <h5 class="label"><span><?php echo Html::encode($articleAboutNews->title); ?></span></h5>
                </a>
              </div>
              <?php $articleAboutNews = array_shift($articleAboutNewsList); ?>
              <div class="news-img">
                <a href="<?php echo Url::to(['article/detail','id'=>$articleAboutNews->id]);?>"​>
                  <img src="<?php echo $articleAboutNews->thumbnail_url; ?>" alt="<?php echo Html::encode($articleAboutNews->title); ?>">
                  <h5 class="label"><span><?php echo Html::encode($articleAboutNews->title); ?></span></h5>
                </a>
              </div>
            </div>
            <ul class="list">
              <?php foreach ( $articleAboutNewsList as $articleAboutNews ) : ?>
              <li>
                <span class="time"><?php echo $articleAboutNews->date; ?></span>
                <a href="<?php echo Url::to(['article/detail','id'=>$articleAboutNews->id]);?>"​>
                  <?php echo Html::encode($articleAboutNews->title); ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php endif;?>
          </div>
        </div>
        
        <?php if ( !empty($partSchools) ) :?>
        <h3 class="tit-h3">这些名校<span>牵手了我们</span></h3>
        <ul class="ul-ind1 slick-ind2">
          <?php foreach ( $partSchools as $school ) : ?>
          <li>
            <a href="javascript:;"​ class="item1">
              <img src="<?php echo $school->logo_url; ?>" alt="<?php echo Html::encode($school->name); ?>">
              <h5 class="label"><?php echo Html::encode($school->name); ?></h5>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        
        <?php if ( !empty($partComs) ): ?>
        <h3 class="tit-h3">TA们很多被这些<span>知名企业挑中</span></h3>
        <ul class="ul-ind1 slick-ind2">
          <?php foreach ( $partComs as $company ) : ?>
          <li>
            <a href="javascript:;"​ class="item2">
              <img src="<?php echo $company->logo_url; ?>" alt="360">
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        
        <h3 class="tit-h3">规模不算很大，<span>只是遍布了全国</span></h3>
        <div class="addr-map">
          <div class="img">
            <img src="picture/15142795425a421276edc491.02047822.png" alt="">
          </div>
          <div class="txt">
            <div class="tit">技续 - 为技能延续</div>
            <ul class="list">
              <li>
                <i class="icon i1"></i>
                <p class="p1">咨询电话</p>
                <p><?php echo Html::encode(JxConfiguration::get('company_tel'));?></p>
              </li>
              <li>
                <i class="icon i2"></i>
                <p class="p1">公司网址</p>
                <p><?php echo Html::encode(JxConfiguration::get('company_website'));?></p>
              </li>
              <li>
                <i class="icon i3"></i>
                <p class="p1">公司地址</p>
                <p><?php echo Html::encode(JxConfiguration::get('company_address'));?></p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  
<div class="main-ft">
  <div class="wp">
    <ul class="link">
      <li><a style="background-image: url(<?php echo FrontendAsset::getResUrl('images/dianlaosl.png'); ?>)">真实企业实训</a></li>
      <li><a style="background-image: url(<?php echo FrontendAsset::getResUrl('images/link-icon2.png'); ?>);">高端人才培养基地</a></li>
      <li><a style="background-image: url(<?php echo FrontendAsset::getResUrl('images/link-icon3.png'); ?>);">大牛导师授课</a></li>
      <li><a style="background-image: url(<?php echo FrontendAsset::getResUrl('images/link-icon4.png'); ?>);">精品视频教程</a></li>
      <li><a style="background-image: url(<?php echo FrontendAsset::getResUrl('images/link-icon5.png'); ?>);">免费职业规划</a></li>
    </ul>
  </div>
</div>

<style>
a.item:hover {color: #6b6b6b; text-decoration:none;}
</style>