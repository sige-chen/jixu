<?php
use yii\db\Migration;
/**
 * Class m201002_101339_add_data_to_jx_pages
 */
class m201002_101339_add_data_to_jx_pages extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_pages', ['name'=>'qygj','title'=>'企业共建','edit_mode'=>'2','content'=>'<p>哒哒哒大</p>']);
        $this->insert('jx_pages', ['name'=>'ppgs','title'=>'品牌故事','edit_mode'=>'2','content'=>'<p>品牌故事品牌故事品牌故事</p>']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_pages', '1=1');
    }
}
