<?php
use yii\db\Migration;
/**
 * Class m201002_022021_add_data_to_jx_company_partners
 */
class m201002_022021_add_data_to_jx_company_partners extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'北京大学','logo_url'=>'/img/demo/part-school-001.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'山东大学','logo_url'=>'/img/demo/part-school-002.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'厦门大学','logo_url'=>'/img/demo/part-school-003.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'中国人民大学','logo_url'=>'/img/demo/part-school-004.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'清华大学','logo_url'=>'/img/demo/part-school-005.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'北京航空航天','logo_url'=>'/img/demo/part-school-006.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'北京理工大学','logo_url'=>'/img/demo/part-school-007.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'中国农业大学','logo_url'=>'/img/demo/part-school-008.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'北京师范大学','logo_url'=>'/img/demo/part-school-009.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'中央民族大学','logo_url'=>'/img/demo/part-school-010.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'南开大学','logo_url'=>'/img/demo/part-school-011.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'天津大学','logo_url'=>'/img/demo/part-school-012.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'大连理工大学','logo_url'=>'/img/demo/part-school-013.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'东北大学','logo_url'=>'/img/demo/part-school-014.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'吉林大学','logo_url'=>'/img/demo/part-school-015.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'哈尔滨工业大','logo_url'=>'/img/demo/part-school-016.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'复旦大学','logo_url'=>'/img/demo/part-school-017.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'同济大学','logo_url'=>'/img/demo/part-school-018.png']);
        $this->insert('jx_company_partners', ['type'=>2,'name'=>'上海交通大学','logo_url'=>'/img/demo/part-school-019.png']);
        
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'360','logo_url'=>'/img/demo/part-com-001.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'爱奇艺','logo_url'=>'/img/demo/part-com-002.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'阿里巴巴','logo_url'=>'/img/demo/part-com-003.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'百度','logo_url'=>'/img/demo/part-com-004.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'谷歌','logo_url'=>'/img/demo/part-com-005.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'东软','logo_url'=>'/img/demo/part-com-006.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'国美电器','logo_url'=>'/img/demo/part-com-007.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'联通','logo_url'=>'/img/demo/part-com-008.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'联想','logo_url'=>'/img/demo/part-com-009.jpg']);
        $this->insert('jx_company_partners', ['type'=>1,'name'=>'优酷','logo_url'=>'/img/demo/part-com-010.jpg']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_company_partners','1=1');
    }
}
