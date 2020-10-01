<?php
use yii\db\Migration;
/**
 * Class m200930_055927_create_table_jx_pages
 */
class m200930_055927_create_table_jx_pages extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_pages', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string(255)->notNull()->comment('名称'),
            'title' => $this->string(255)->notNull()->comment('标题'),
            'edit_mode' => $this->integer()->notNull()->defaultValue(1)->comment('编辑模式'),
            'content' => $this->text()->defaultValue('')->comment('内容'),
        ]);
        $this->addCommentOnTable('jx_pages', '页面表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_pages');
    }
}
