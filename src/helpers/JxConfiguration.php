<?php
namespace app\helpers;
use app\models\MdlConfigurations;
/**
 *
 */
class JxConfiguration {
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