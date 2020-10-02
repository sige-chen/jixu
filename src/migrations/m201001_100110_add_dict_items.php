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
        $this->insert('jx_dict', ['group'=>'AD_POSITION','group_name'=>'广告位置','key'=>'COURSE_INDEX','key_name'=>'课程列表','value'=>'5','value_name'=>'课程列表']);
        $this->insert('jx_dict', ['group'=>'AD_POSITION','group_name'=>'广告位置','key'=>'TEACHER_INDEX','key_name'=>'教师列表','value'=>'6','value_name'=>'教师列表']);
        $this->insert('jx_dict', ['group'=>'AD_POSITION','group_name'=>'广告位置','key'=>'ARTICLE_INDEX','key_name'=>'文章列表','value'=>'7','value_name'=>'文章列表']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_dict',['group'=>'CONFIG_VAL_TYPE','key'=>'STRING']);
        $this->delete('jx_dict',['group'=>'CONFIG_VAL_TYPE','key'=>'LIST']);
        $this->delete('jx_dict',['group'=>'AD_POSITION','key'=>'COURSE_INDEX']);
        $this->delete('jx_dict',['group'=>'AD_POSITION','key'=>'TEACHER_INDEX']);
        $this->delete('jx_dict',['group'=>'ARTICLE_INDEX','key'=>'TEACHER_INDEX']);
    }
}
