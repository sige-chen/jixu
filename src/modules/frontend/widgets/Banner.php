<?php
namespace app\modules\frontend\widgets;
use app\models\MdlBanners;

class Banner extends \yii\bootstrap\Widget {
    /**
     * @var string
     */
    public $target = null;
    
    /**
     * {@inheritDoc}
     * @see \yii\base\Widget::run()
     */
    public function run() {
        $banner = MdlBanners::findOne(['target'=>$this->target]);
        return "<div class=\"ban\"><img src=\"{$banner->img_url}\" alt=\"\"></div>";
    }
}