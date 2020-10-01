<?php
use yii\db\Migration;
/**
 * Class m200930_072809_create_table_jx_banners
 */
class m200930_072809_create_table_jx_banners extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_banners', [
            'id' => $this->primaryKey()->comment('ID'),
            'target' => $this->string(255)->comment('目标名称'),
            'img_url' => $this->string(255)->comment('图片链接'),
            'link' => $this->string(255)->comment('链接地址'),
        ]);
        $this->addCommentOnTable('jx_banners', '轮播图片表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_banners');
    }
}
