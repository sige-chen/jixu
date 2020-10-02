<?php
use yii\db\Migration;
/**
 * Class m201001_090951_add_configuration_item
 */
class m201001_090951_add_configuration_item extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_configurations', ['key'=>'ENABLE_POPUP_AD','value'=>'ON','note'=>'启用弹框咨询','type'=>'1']);
        $this->insert('jx_configurations', ['key'=>'ENABLE_FOOTER_AD','value'=>'ON','note'=>'自用页脚咨询','type'=>'1']);
        $this->insert('jx_configurations', ['key'=>'NAV_PAGES','value'=>'qygj,ppgs','note'=>'头部导航页面','type'=>'2']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_configurations',['key'=>'ENABLE_POPUP_AD']);
        $this->delete('jx_configurations',['key'=>'ENABLE_FOOTER_AD']);
        $this->delete('jx_configurations',['key'=>'NAV_PAGES']);
    }
}
