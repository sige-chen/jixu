<?php
use yii\db\Migration;
/**
 * Class m200930_072314_create_table_jx_articles
 */
class m200930_072314_create_table_jx_articles extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('jx_articles', [
            'id' => $this->primaryKey()->comment('ID'),
            'type' => $this->integer()->comment('类型'),
            'title' => $this->string(255)->comment('标题'),
            'summary' => $this->string(255)->comment('简介'),
            'content' => $this->string(255)->comment('内容'),
            'status' => $this->integer()->comment('状态'),
            'thumbnail_url' => $this->string(255)->comment('缩略图'),
            'date' => $this->date()->comment('发表日期'),
        ]);
        $this->addCommentOnTable('jx_articles', '文章表');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('jx_articles');
    }
}
