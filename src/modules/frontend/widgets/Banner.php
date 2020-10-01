<?php
namespace app\modules\frontend\widgets;
use app\models\MdlAdvertisements;
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
        $banner = MdlAdvertisements::findOne(['position'=>$this->target]);
        return "<div class=\"ban\"><img src=\"{$banner->img_url}\" alt=\"\"></div>";
    }
}