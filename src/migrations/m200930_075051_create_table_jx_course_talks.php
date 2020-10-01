<?php
use yii\db\Migration;
/**
 * Class m200930_075051_create_table_jx_course_talks
 */
class m200930_075051_create_table_jx_course_talks extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_talks', [
            'id' => $this->primaryKey()->comment('ID'),
            'course_id' => $this->integer()->comment('课程ID'),
            'user_id' => $this->integer()->comment('用户ID'),
            'title' => $this->string(255)->comment('标题'),
            'parent_id' => $this->integer()->comment('父讨论ID'),
            'content' => $this->string(255)->comment('内容'),
            'created_time' => $this->dateTime()->comment('创建时间'),
        ]);
        $this->addCommentOnTable('jx_course_talks', '课程讨论表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_talks');
    }
}
