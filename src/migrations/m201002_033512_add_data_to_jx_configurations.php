<?php
use yii\db\Migration;
/**
 * Class m201002_033512_add_data_to_jx_configurations
 */
class m201002_033512_add_data_to_jx_configurations extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_configurations', ['key'=>'COMPANY_TEL','value'=>'010-80088008','note'=>'咨询电话','type'=>'1']);
        $this->insert('jx_configurations', ['key'=>'COMPANY_WEBSITE','value'=>'www.chenshuang.com','note'=>'公司网址','type'=>'1']);
        $this->insert('jx_configurations', ['key'=>'COMPANY_ADDRESS','value'=>'上海市崇明区晨霜大厦','note'=>'公司地址','type'=>'1']);
        $this->insert('jx_configurations', ['key'=>'WEBSITE_BEIAN','value'=>'苏 ICP 001212121312 备','note'=>'网站备案号','type'=>'1']);
        $this->insert('jx_configurations', ['key'=>'COPY_RIGHT','value'=>'晨霜科技有限公司','note'=>'版权所有者','type'=>'1']);
        $this->insert('jx_configurations', ['key'=>'SERVICE_QQ','value'=>'568109749','note'=>'客服QQ','type'=>'1']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_configurations',['key'=>['SERVICE_QQ','COMPANY_TEL','COMPANY_WEBSITE','COMPANY_ADDRESS','WEBSITE_BEIAN','COPY_RIGHT']]);
    }
}
