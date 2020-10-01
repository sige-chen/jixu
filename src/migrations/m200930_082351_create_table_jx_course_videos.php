<?php
use yii\db\Migration;
/**
 * Class m200930_082351_create_table_jx_course_videos
 */
class m200930_082351_create_table_jx_course_videos extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_course_videos', [
            'id' => $this->primaryKey()->comment('ID'),
            
            'title' => $this->string(255)->comment('标题'),
            'video_url' => $this->string(255)->comment('视频链接'),
            'thunmnail_url' => $this->string(255)->comment('缩略图'),
            
            'length' => $this->integer()->comment('长度'),
            'collection_id' => $this->integer()->comment('集合ID'),
            'index' => $this->integer()->comment('编号'),
        ]);
        $this->addCommentOnTable('jx_course_videos', '课程视频表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_course_videos');
    }
}
