<?php
use yii\db\Migration;
/**
 * Class m200930_074057_create_table_jx_course_book_links
 */
class m200930_074057_create_table_jx_course_book_links extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_book_links', [
            'id' => $this->primaryKey()->comment('ID'),
            'title' => $this->string(255)->comment('标题'),
            'link' => $this->string(255)->comment('购买链接'),
            'thumbnail_url' => $this->string(255)->comment('缩略图'),
            'source' => $this->string(255)->comment('来源'),
            'price' => $this->decimal(10,2)->comment('价格'),
            'course_id'=>$this->integer()->comment('课程ID'),
        ]);
        $this->addCommentOnTable('jx_course_book_links', '课程教材购买链接');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_book_links');
    }
}
