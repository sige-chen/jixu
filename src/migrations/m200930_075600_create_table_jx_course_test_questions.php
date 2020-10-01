<?php
use yii\db\Migration;
/**
 * Class m200930_075600_create_table_jx_course_test_questions
 */
class m200930_075600_create_table_jx_course_test_questions extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_test_questions', [
            'id' => $this->primaryKey()->comment('ID'),
            
            'course_id' => $this->integer()->comment('课程ID'),
            'test_id' => $this->integer()->comment('试卷ID'),
            'type' => $this->integer()->comment('类型'),
            
            'content' => $this->string(255)->comment('内容'),
            'options' => $this->string(255)->comment('选项'),
            'answer' => $this->string(255)->comment('参考答案'),
            'tip' => $this->string(255)->comment('提示'),
            
            'index' => $this->integer()->comment('编号'),
        ]);
        $this->addCommentOnTable('jx_course_test_questions', '课程问卷问题');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_test_questions');
    }
}
