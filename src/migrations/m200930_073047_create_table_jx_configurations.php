<?php
use yii\db\Migration;
/**
 * Class m200930_073047_create_table_jx_configurations
 */
class m200930_073047_create_table_jx_configurations extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_configurations', [
            'id' => $this->primaryKey()->comment('ID'),
            'key' => $this->string(63)->comment('键名'),
            'value' => $this->string(1023)->defaultValue('')->comment('键值'),
            'note' => $this->string(255)->defaultValue('')->comment('说明'),
            'type' => $this->integer()->defaultValue(1)->comment('数据类型'),
        ]);
        $this->addCommentOnTable('jx_configurations', '系统配置表');
        
        $this->insert('jx_configurations', ['key'=>'COMPANY_SHORT_NAME','value'=>'晨霜','note'=>'企业简称','type'=>'1']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_configurations');
    }
}
