<?php
use yii\db\Migration;
/**
 * Class m200930_080636_create_table_jx_course_tests
 */
class m200930_080636_create_table_jx_course_tests extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_tests', [
            'id' => $this->primaryKey()->comment('ID'),
            'course_id' => $this->integer()->comment('课程ID'),
            'title' => $this->string(255)->comment('标题')
        ]);
        $this->addCommentOnTable('jx_course_tests', '课程试卷表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_tests');
    }
}
