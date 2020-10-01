<?php
use yii\db\Migration;
/**
 * Class m200930_050404_create_table_jx_user_course_collections
 */
class m200930_050404_create_table_jx_user_course_collections extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_user_course_collections', array(
            'id' => $this->primaryKey()->comment('ID'),
            'user_id' => $this->integer()->notNull()->comment('用户ID'),
            'course_id' => $this->integer()->notNull()->comment('课程ID'),
        ));
        $this->addCommentOnTable('jx_user_course_collections', '用户课程收藏表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_user_course_collections');
    }
}
