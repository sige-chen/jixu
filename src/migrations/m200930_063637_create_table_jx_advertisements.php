<?php
use yii\db\Migration;
/**
 * Class m200930_063637_create_table_jx_advertisements
 */
class m200930_063637_create_table_jx_advertisements extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_advertisements', [
            'id' => $this->primaryKey()->comment('ID'),
            'image_url' => $this->string(255)->comment('图片链接'),
            'target_url' => $this->string(255)->comment('目标地址'),
            'position' => $this->integer()->comment('位置'),
            'title' => $this->string(255)->comment('标题')
        ]);
        $this->addCommentOnTable('jx_advertisements', '广告表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_advertisements');
    }
}
