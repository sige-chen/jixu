<?php
use yii\db\Migration;
/**
 * Class m200930_061945_create_table_jx_admin_password_reset_tokens
 */
class m200930_061945_create_table_jx_admin_password_reset_tokens extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_admin_password_reset_tokens', [
            'id' => $this->primaryKey()->comment('ID'),
            'user_id' => $this->string()->notNull()->comment('管理员ID'),
            'token' => $this->string()->notNull()->comment('密钥'),
            'expired_at' => $this->integer()->notNull()->comment('过期时间')
        ]);
        $this->addCommentOnTable('jx_admin_password_reset_tokens', '管理员密码重置密钥表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_admin_password_reset_tokens');
    }
}
