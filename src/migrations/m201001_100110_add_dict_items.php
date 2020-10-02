<?php
use yii\db\Migration;
/**
 * Class m201001_100110_add_dict_items
 */
class m201001_100110_add_dict_items extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_dict', ['group'=>'CONFIG_VAL_TYPE','group_name'=>'配置项数据类型','key'=>'STRING','key_name'=>'字符串','value'=>'1','value_name'=>'字符串']);
        $this->insert('jx_dict', ['group'=>'CONFIG_VAL_TYPE','group_name'=>'配置项数据类型','key'=>'LIST','key_name'=>'列表','value'=>'2','value_name'=>'列表']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_dict',['group'=>'CONFIG_VAL_TYPE','key'=>'STRING']);
        $this->delete('jx_dict',['group'=>'CONFIG_VAL_TYPE','key'=>'LIST']);
    }
}
