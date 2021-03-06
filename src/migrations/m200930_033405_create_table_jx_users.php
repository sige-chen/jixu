<?php
use yii\db\Migration;
/**
 * Class m200930_033405_create_table_jx_users
 */
class m200930_033405_create_table_jx_users extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_users', [
            'id' => $this->primaryKey()->comment('ID'),
            'email' => $this->string(63)->notNull()->comment('邮箱'),
            'password' => $this->string(32)->notNull()->comment('密码'),
            'photo_url' => $this->string(255)->notNull()->comment('头像'),
            'nickname' => $this->string(32)->notNull()->comment('昵称'),
        ]);
        $this->addCommentOnTable('jx_users', '用户表');
        $this->insert('jx_users', ['email'=>'user@example.com','password'=>md5('123456'),'photo_url'=>'/img/avatar.png','nickname'=>'用户01']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_users');
    }
}
