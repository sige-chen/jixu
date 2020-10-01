<?php
use yii\db\Migration;
/**
 * Class m200930_053339_create_table_jx_user_course_cards
 */
class m200930_053339_create_table_jx_user_course_cards extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_user_course_cards', [
            'id' => $this->primaryKey()->comment('ID'),
            'course_id' => $this->integer()->notNull()->comment('课程ID'),
            'user_id' => $this->integer()->notNull()->comment('用户ID'),
            'title' => $this->string(255)->comment('标题'),
            'content' => $this->string(255)->comment('内容'),
        ]);
        $this->addCommentOnTable('jx_user_course_cards', '用户课程卡片表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_user_course_cards');
    }
}
