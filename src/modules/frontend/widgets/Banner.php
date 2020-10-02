<?php
namespace app\modules\frontend\widgets;
use app\models\MdlAdvertisements;
use app\helpers\JxDictionary;
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
        $banner = MdlAdvertisements::findOne(['position'=>JxDictionary::value('AD_POSITION', $this->target)]);
        if ( null === $banner ) {
            return '';
        }
        return "<div class=\"ban\"><img src=\"{$banner->image_url}\" alt=\"\"></div>";
    }
}