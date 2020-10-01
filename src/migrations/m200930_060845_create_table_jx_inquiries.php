<?php
use yii\db\Migration;
/**
 * Class m200930_060845_create_table_jx_inquiries
 */
class m200930_060845_create_table_jx_inquiries extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_inquiries', [
            'id' => $this->primaryKey()->comment('ID'),
            'user_id' => $this->integer()->notNull()->comment('用户ID'),
            'name' => $this->string(255)->comment('姓名'),
            'phone' => $this->string(255)->comment('手机'),
            'qq' => $this->string(255)->comment('QQ'),
            'sex'=> $this->string(255)->comment('性别'),
            'message' => $this->string(255)->comment('留言'),
            'created_at' => $this->dateTime()->comment('创建时间')
        ]);
        $this->addCommentOnTable('jx_inquiries', '客户咨询表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_inquiries');
    }
}
