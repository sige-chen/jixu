<?php
use yii\db\Migration;
/**
 * Class m201001_122719_add_data_to_jx_advertisements
 */
class m201001_122719_add_data_to_jx_advertisements extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/index-ban-01.jpg','target_url'=>'#','position'=>'4','title'=>'首页Banner001']);
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/index-ban-02.jpg','target_url'=>'#','position'=>'4','title'=>'首页Banner002']);
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/index-ban-03.jpg','target_url'=>'#','position'=>'4','title'=>'首页Banner003']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/index-ban-01.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/index-ban-02.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/index-ban-03.jpg']);
    }
}
