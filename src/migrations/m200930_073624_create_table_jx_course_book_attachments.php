<?php
use yii\db\Migration;
/**
 * Class m200930_073624_create_table_jx_course_book_attachments
 */
class m200930_073624_create_table_jx_course_book_attachments extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_book_attachments', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string(255)->comment('名称'),
            'download_url' => $this->string(255)->comment('下载链接'),
            'course_id' => $this->integer()->comment('课程ID'),
        ]);
        $this->addCommentOnTable('jx_course_book_attachments', '课程教材附件表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_book_attachments');
    }
}
