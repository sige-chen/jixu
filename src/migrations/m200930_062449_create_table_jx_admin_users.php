<?php
use yii\db\Migration;
/**
 * Class m200930_062449_create_table_jx_admin_users
 */
class m200930_062449_create_table_jx_admin_users extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_admin_users', [
            'id' => $this->primaryKey()->comment('ID'),
            'username' => $this->string(32)->notNull()->comment('用户名'),
            'password' => $this->string(32)->notNull()->comment('密码'),
            'email' => $this->string(64)->notNull()->comment('邮箱'),
            'nickname' => $this->string(32)->notNull()->comment('昵称'),
            'photo_url' => $this->string(255)->comment('头像'),
            'type' => $this->integer()->comment('类型'),
            'title' => $this->string(255)->comment('职位'),
            'introduction' => $this->string(255)->comment('简介')
        ]);
        $this->addCommentOnTable('jx_admin_users', '管理员表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_admin_users');
    }
}
