<?php
use yii\db\Migration;
/**
 * Class m200925_145320_create_table_jx_users
 */
class m200925_145320_create_table_jx_users extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_users', [
            'id' => $this->primaryKey()->comment('ID'),
            'email' => $this->string(64)->notNull()->unique()->comment('邮箱'),
            'password' => $this->string(32)->notNull()->defaultValue('')->comment('密码'),
            'photo_url' => $this->string(255)->notNull()->comment('头像链接'),
            'nickname' => $this->string(32)->defaultValue('')->comment('昵称'),
        ]);
        $this->addCommentOnTable('jx_users', '用户表');
        $this->insert('jx_users', ['email'=>'user@example.com','password'=>md5('123456'),'photo_url'=>'/img/avatar.png','nickname'=>'初始用户']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_users');
    }
}
