<?php
use yii\db\Migration;
/**
 * Class m201001_090540_drop_table_jx_banners
 */
class m201001_090540_drop_table_jx_banners extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->dropTable('jx_banners');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        require_once __DIR__.'/m200930_072809_create_table_jx_banners.php';
        $mig = new m200930_072809_create_table_jx_banners();
        $mig->up();
    }
}
