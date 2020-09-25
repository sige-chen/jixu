<?php
namespace app\modules\admin\assets;
use yii\web\AssetBundle;
class AdminAsset extends AssetBundle {
    /**
     * @var string
     */
    public $sourcePath = '@admin-assets';
    /**
     * @var string
     */
    public $baseUrl = '@web';
    
    /**
     * @var array
     */
    public $css = [
        'plugins/fontawesome-free/css/all.min.css',
        'plugins/icheck-bootstrap/icheck-bootstrap.min.css',
        'dist/css/adminlte.min.css',
        'css/admin.css',
    ];
    /**
     * @var array
     */
    public $js = [
        'plugins/jquery/jquery.min.js',
        'plugins/bootstrap/js/bootstrap.bundle.min.js',
        'dist/js/adminlte.min.js',
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