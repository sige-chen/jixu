<?php 
use yii\helpers\Url;
use app\helpers\JxConfiguration;
use yii\helpers\Html;
use app\helpers\JxDictionary;
use app\modules\frontend\assets\FrontendAsset;
use app\models\MdlPage;
/* @var $content string */
/* @var \yii\web\View $this */
/* @var string $content */ 
$user = Yii::$app->user;
$bundle = FrontendAsset::register($this);

$navPages = MdlPage::findAll(['name'=>JxConfiguration::get('NAV_PAGES')]);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php echo Html::encode($this->params['title']);?> - 技续 - 为技能延续</title>
<meta name="keywords" content="技续，培训，课程，网课" />
<meta name="description" content="技续为大家提供了丰富的在线课程，每个课程由经验丰富的的讲师精心录制。" /> 
<?php $this->head(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
a {color:#6b6b6b;}
.clear{clear:both;}
.slick-ind2 .slick-dots { bottom: -20px; }
</style>
</head>
<body>
  <?php $this->beginBody(); ?>
  <div style="display:none"></div>
  <div class="header">
    <div class="logo">
      <a href="<?php echo Url::to(['index/index']); ?>"​><img src="<?php echo FrontendAsset::getResUrl('images/logo.png'); ?>"></a>
    </div>
    <div class="hdr">
      <?php if ( $user->isGuest ): ?>
      <a class="a1" href="<?php echo Url::to(['login/index']);?>"​><span>登录/注册</span></a>
      <a class="a2 show_contact" href="#"​><span>我要报名</span></a>
      <?php else :?>
      <a style="text-align:right;width: 150px;" href="<?php echo Url::to(['user/home']);?>"​><span><?php echo Html::encode($user->getIdentity()->nickname);?></span></a>
      <a style="width: 50px;margin-left: 0;text-align: left;" href="<?php echo Url::to(['login/logout']); ?>"​><span>退出</span></a>
      <?php endif; ?>
    </div>
    <div class="nav">
      <ul>
        <li class=""><a href="<?php echo Url::to(['index/index']); ?>"​>首页</a></li>
        <li class="">
          <a href="<?php echo Url::to(['course/index']); ?>"​>课程设置</a>
        </li>
        <li class="">
          <a href="<?php echo Url::to(['teacher/index']);?>"​>大牛导师</a>
        </li>
        <li class="">
          <a href="<?php echo Url::to(['article/category','cat'=>JxDictionary::value('ARTICLE_TYPE','ABOUT_NEWS')]); ?>"​>企业动态</a>
        </li>
        <?php foreach ( $navPages as $navPage ) : ?>
        <li class="">
          <a href="<?php echo Url::to(['page/show','name'=>$navPage->name]);?>"​>
            <?php echo Html::encode($navPage->title); ?>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
<?= $content ?>
<!-- footer -->
<?php if (Yii::$app->user->isGuest && 'ON' === JxConfiguration::get('ENABLE_FOOTER_AD', 'ON')): ?>
<div class="float-ft" style="background-image: url(<?php echo FrontendAsset::getResUrl('images/ft-adbg.jpg'); ?>);">
  <div class="wp">
    <div class="ft-form">
      <form id="w0" action="<?php echo Url::to(['inquiry/save']); ?>" method="post" role="form">
        <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
          <span class="close" id="btn-footer-ad-close"></span>
          <input class="inp" name="form[name]" type="text" placeholder="如何称呼您">
          <input class="inp" name="form[phone]" type="text" placeholder="您的手机">
          <input class="inp" name="form[qq]" type="text" placeholder="您的QQ">
          <input class="btn" id="course_submit" type="submit" value="免费获取课程">
        </form>
    </div>
  </div>
</div>
<?php endif;?>
    
    <div class="footer">
      <div class="wp">
        <div class="hd">
          <div class="map"></div>
          <div class="link-ft">
            <dl>
              <dt><a href="#"​>企业动态</a></dt>
              <dd><a href="#"​>公司公告</a></dd>
              <dd><a href="#"​>公司动态</a></dd>
            </dl>
            <dl>
              <dt><a href="#"​>名企共建</a></dt>
              <dd><a href="#"​>名校合作</a></dd>
              <dd><a href="#"​>名企合作</a></dd>
            </dl>
          </div>
        </div>
        <div class="copyr">
          <div class="share-ft">
            <a class="weibo" href="#"​></a>
            <a class="wechat" href="#"​></a>
            <div class="qr-code"> 
              <img src="" alt="">
              <em class="label">扫一扫 送助学金</em>
            </div>
          </div>
          <div class="txt">
            <span>技续</span> |
            <span><?php echo JxConfiguration::get('WEBSITE_BEIAN');?></span> |
            <span> 咨询热线：<?php echo JxConfiguration::get('COMPANY_TEL'); ?></span> |
            <span> 地址：<?php echo Html::encode(JxConfiguration::get('COMPANY_ADDRESS')); ?></span> |
            <span> 版权所有：<?php echo Html::encode(JxConfiguration::get('COPY_RIGHT')); ?></span>
          </div>
        </div>
      </div>
    </div>
    
<!-- 表单弹出开始-->
<div class="all_filter_page" id="all_filter_page" style="display:none;"></div>
<div class="form-div" id="contact_us_div_unique" style="display:none;">
  <form id="w0" action="<?php echo Url::to(['inquiry/save']); ?>" method="post" role="form">
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->getCsrfToken();?>">
    <div id="reg-form">
      <table>
        <tr>
          <td style="text-align: left">姓名:</td>
          <td>
            <input name="form[name]"  type="text"  id="username" easyform="length:2-16;" message="用户名必须为2-16位中/英文字符或数字" easytip="disappear:lost-focus;theme:blue;">
          </td>
        </tr>
        <tr>
          <td style="text-align: left">电话:</td>
          <td>
            <input  name="form[phone]" type="text" id="phone" easyform="length:6-16;rule;" message="手机号码格式错误" easytip="disappear:lost-focus;theme:blue;">
          </td>
        </tr>
        <tr>
          <td style="text-align: left">QQ:</td>
          <td>
            <input name="form[qq]" type="text" id="qq" easyform="length:6-16;num;" message="qq格式错误" easytip="disappear:lost-focus;theme:blue;">
          </td>
        </tr>
        <tr>
          <td style="text-align: left">性别:</td>
          <td style="text-align: left">
            <input type="radio" class="sex" name="form[sex]" checked value="m" style="margin:0 9px 0 22px">男
            <input type="radio" name="form[sex]" value="f" style="margin:0 12px">女
          </td>
        </tr>
        <tr>
          <td style="text-align: left">留言:</td>
          <td><textarea id="text_area" name="form[message]"></textarea></td>
        </tr>
      </table>
      <div class="buttons">
        <input value="提 交" type="submit" style="margin-top:20px;">
      </div>
      <br class="clear">
    </div>
  </form>
</div>
    
<!-- 咨询弹窗 -->
<div class="pop-zixun">
  <div class="cont">
    <span class="close"></span>
    <div class="tit">
      <span class="icon"></span>您的专属顾问-在线咨询
    </div>
    <div class="bd">
      <h2>申请免费试听</h2>
      <a id="btn-apply" class="btn" href="#"​ style="padding:0;">立即申请</a>
    </div>
    <div style="height: 15px;"></div>
    <div class="link">
      <a class="s1" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo JxConfiguration::get('SERVICE_QQ');?>&site=qq&menu=yes"​ target="_blank">QQ咨询</a>
      <a class="s2" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo JxConfiguration::get('SERVICE_QQ');?>&site=qq&menu=yes"​ target="_blank">在线咨询</a>
    </div>
  </div>
</div>
  
<?php $this->endBody(); ?>
<script type="text/javascript">
<?php if ( Yii::$app->user->isGuest && 'ON' === JxConfiguration::get('ENABLE_POPUP_AD','ON') ): ?>
/**
 * 咨询弹框
 * */
(function() {
  if ( 'off' == $('#conf-zixun-popup').val() ) {
    return;
  }
  var openPop = function () {
    $('.pop-zixun').fadeIn()
  }
  
  setTimeout(openPop,15 * 1000);
  $('.pop-zixun .close').click(function(){
    $(this).parents('.pop-zixun').fadeOut();
    setTimeout(openPop, 30 * 1000);
  });
})();
<?php endif; ?>
$(document).ready(function() {
  $('#btn-apply').click(function(){
    $("#all_filter_page").show();
    $("#contact_us_div_unique").show();
    disableScroll();
  });

  $('#btn-footer-ad-close').click(function() {
    $('.float-ft').hide();
  });
});






    $('.banner').slick({
        arrows: false,
        dots: true,
        autoplay: true
    })
    $('.slick-ind1').slick({
        arrows: true,
        dots: false,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1
    })
    $('.slick-ind2').slick({
        arrows: false,
        dots: false,
        autoplay: true,
        slidesToShow: 6,
        slidesToScroll: 6
    });
    
    $(".header .hdr .a1").click(function(){
        var is_show = $('.website-switch').css('display');
        if(is_show=='none'){
            $('.website-switch').show();
        }else{
            $('.website-switch').hide();
        }

    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#w0').yiiActiveForm([], []);
    });
</script>
<script type="text/javascript">
                ScrollImgLeft();
          </script>
          </body>
</html>
<?php $this->endPage(); ?>