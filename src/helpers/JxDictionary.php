<?php
namespace app\helpers;
use yii\db\Query;

class JxDictionary {
    /**
     * @param unknown $key
     */
    public static function getItems( $group ) {
        $lists = (new Query())->select(['value','value_name'])->from('jx_dict')->where(['group'=>$group])->all();
        $items = array();
        foreach ( $lists as $record ) {
            $items[$record['value']] = $record['value_name'];
        }
        return $items;
    }
    
    /**
     * @param unknown $group
     * @param unknown $key
     * @return unknown[]
     */
    public static function getItemValueName($group, $value) {
        $item = (new Query())->select(['value_name'])->from('jx_dict')->where(['group'=>$group,'value'=>$value])->one();
        return $item['value_name'];
    }
    
    public static function match( $group, $keys, $value ) {
        if ( !is_array($keys) ) {
            $keys = [$keys];
        }
        
        $lists = (new Query())->select(['value'])->from('jx_dict')->where(['group'=>$group,'key'=>$keys])->all();
        foreach ( $lists as $record ) {
            if ( $record['value'] == $value ) {
                return true;
            }
        }
        return false;
    }
    
    public static function value( $group, $key ) {
        $item = (new Query())->select(['value'])->from('jx_dict')->where(['group'=>$group,'key'=>$key])->one();
        return $item['value'];
    }
}