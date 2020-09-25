<?php
namespace app\modules\frontend\assets;
use yii\web\AssetBundle;
class FrontendAsset extends AssetBundle {
    /**
     * @var string
     */
    public $sourcePath = '@frontend-assets';
    /**
     * @var string
     */
    public $baseUrl = '@web';
    
    /**
     * @var array
     */
    public $css = [
        'css/style.css',
        'css/slick.css',
        'css/cui.css',
        'css/lib.css',
        'css/tanchubiaodan.css',
        'css/nav.css',
    ];
    /**
     * @var array
     */
    public $js = [
        'js/syhd.js',
        'js/jquery.js',
        'js/lsjs.js',
        'js/slick.min.js',
        'js/lib.js',
        'js/easyform.js',
        'js/yii.js',
        'js/yii.activeform.js',
    ];
    
    /**
     * @var array
     */
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    
    /**
     * @param unknown $res
     * @return string
     */
    public static function getResUrl($res) {
        $bundle = self::register(\Yii::$app->view);
        return \Yii::$app->view->getAssetManager()->getAssetUrl($bundle, $res);
    }
} 