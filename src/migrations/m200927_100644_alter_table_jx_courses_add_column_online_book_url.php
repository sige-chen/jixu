<?php
use yii\db\Migration;
/**
 * Class m200927_100644_alter_table_jx_courses_add_column_online_book_path
 */
class m200927_100644_alter_table_jx_courses_add_column_online_book_url extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->addColumn('jx_courses', 'online_book_url', $this->string(255)->defaultValue('')->comment('在线教材文件'));
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropColumn('jx_courses', 'online_book_url');
    }
}
