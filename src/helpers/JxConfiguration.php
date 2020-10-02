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
     * @return string|array
     */
    public static function get( $item, $default=null ) {
        $config = MdlConfigurations::findOne(['key'=>$item]);
        if ( null === $config ) {
            return $default;
        }
        
        if ( JxDictionary::match('CONFIG_VAL_TYPE', 'LIST', $config->type) ) {
            $config->value = explode(',', $config->value);
        }
        return $config->value;
    }
}