<?php
use yii\db\Migration;
/**
 * Class m200927_051128_create_table_jx_course_purchase_tokens
 */
class m200927_051128_create_table_jx_course_purchase_tokens extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_purchase_tokens', [
            'id' => $this->primaryKey()->comment('ID'),
            'course_id' => $this->integer()->notNull()->comment('课程ID'),
            'admin_id' => $this->integer()->notNull()->comment('管理员ID'),
            'token' => $this->string(32)->notNull()->comment('密钥'),
            'status' => $this->integer()->notNull()->comment('状态'),
        ]);
        $this->addCommentOnTable('jx_course_purchase_tokens', '课程密钥表');
    }

    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_purchase_tokens');
    }
}
