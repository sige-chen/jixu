<?php
use yii\db\Migration;
/**
 * Class m200930_074735_crate_table_jx_course_notes
 */
class m200930_074735_create_table_jx_course_notes extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_notes', [
            'id' => $this->primaryKey()->comment('ID'),
            'course_id' => $this->integer()->comment('课程ID'),
            'user_id' => $this->integer()->comment('用户ID'),
            
            'title' => $this->string(255)->comment('标题'),
            'content' => $this->string(255)->comment('内容'),
            'type' => $this->string(255)->comment('类型'),
        ]);
        $this->addCommentOnTable('jx_course_notes', '课程笔记表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_notes');
    }
}
