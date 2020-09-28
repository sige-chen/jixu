<?php
use yii\db\Migration;
/**
 * Class m200928_014106_create_table_jx_course_book_notes
 */
class m200928_014106_create_table_jx_course_book_notes extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_book_notes', array(
            'id' => $this->primaryKey()->comment('ID'),
            'course_id' => $this->integer()->notNull()->comment('课程ID'),
            'user_id' => $this->integer()->notNull()->comment('用户ID'),
            'page' => $this->integer()->notNull()->comment('页码'),
            'content'=>$this->string(512)->notNull()->comment('内容')
        ));
        $this->addCommentOnTable('jx_course_book_notes', '教程教材在线笔记');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_book_notes');
    }
}
