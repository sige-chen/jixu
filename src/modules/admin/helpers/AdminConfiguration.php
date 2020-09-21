<?php
namespace app\modules\admin\helpers;
use app\models\MdlConfigurations;
/**
 *
 */
class AdminConfiguration {
    /**
     * 获取配置信息
     * @param string $item
     * @param mixed $default
     * @return mixed
     */
    public static function get( $item, $default=null ) {
        $config = MdlConfigurations::findOne(['key'=>$item]);
        if ( null === $config ) {
            return $default;
        }
        return $config->value;
    }
}