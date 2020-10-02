<?php
use yii\db\Migration;
/**
 * Class m201002_092949_create_table_jx_user_password_reset_tokens
 */
class m201002_092949_create_table_jx_user_password_reset_tokens extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_user_password_reset_tokens', [
            'id' => $this->primaryKey()->comment('ID'),
            'user_id' => $this->string()->notNull()->comment('用户ID'),
            'token' => $this->string()->notNull()->comment('密钥'),
            'expired_at' => $this->integer()->notNull()->comment('过期时间')
        ]);
        $this->addCommentOnTable('jx_user_password_reset_tokens', '用户密码重置密钥表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_user_password_reset_tokens');
    }
}
