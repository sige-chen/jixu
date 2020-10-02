<?php
use yii\db\Migration;
/**
 * Class m201001_101123_create_default_admin_user
 */
class m201001_101123_create_default_admin_user extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_admin_users', [
            'username' => 'admin',
            'password' => md5('admin'),
            'email' => 'admin@example.com',
            'nickname' => '默认管理员',
            'photo_url' => '/img/avatar.png',
            'type' => 0,
            'title' => '默认管理员',
            'introduction' => '这是系统默认的管理员账号，当您正式使用时，应当更改其密码， 或者将其删除并使用新的管理员账号。',
        ]);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_admin_users',['username' => 'admin']);
    }
}
