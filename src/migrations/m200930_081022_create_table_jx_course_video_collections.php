<?php
use yii\db\Migration;
/**
 * Class m200930_081022_create_table_jx_course_video_collections
 */
class m200930_081022_create_table_jx_course_video_collections extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_video_collections', [
            'id' => $this->primaryKey()->comment('ID'),
            'course_id' => $this->integer()->comment('课程ID'),
            'title' => $this->string(255)->comment('标题'),
            'introduction' => $this->string(255)->comment('简介'),
            'thumbnail_url' => $this->string(255)->comment('缩略图'),
            
        ]);
        $this->addCommentOnTable('jx_course_video_collections', '课程视频合集表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_video_collections');
    }
}
