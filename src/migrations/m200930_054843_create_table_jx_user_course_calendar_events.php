<?php
use yii\db\Migration;
/**
 * Class m200930_054843_create_table_jx_user_course_calendar_events
 */
class m200930_054843_create_table_jx_user_course_calendar_events extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_user_course_calendar_events', [
            'id' => $this->primaryKey()->comment('ID'),
            'user_id' => $this->integer()->notNull()->comment('用户ID'),
            'date' => $this->date()->notNull()->comment('日期'),
            'time'=> $this->time()->notNull()->comment('时间'),
            'event'=> $this->string(255)->comment('内容'),
            'type' => $this->integer()->notNull()->comment('类型'),
            'duration' => $this->integer()->comment('耗时'),
            'course_id'=>$this->integer()->comment('课程ID'),
        ]);
        $this->addCommentOnTable('jx_user_course_calendar_events', '用户课程事件表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_user_course_calendar_events');
    }
}
