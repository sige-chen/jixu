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
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/ad-login-left.png','target_url'=>'#','position'=>'2','title'=>'登录页左侧']);
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/ad-register-left.jpg','target_url'=>'#','position'=>'3','title'=>'注册页左侧']);
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/ad-course-index.jpg','target_url'=>'#','position'=>'5','title'=>'课程列表页Banner']);
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/ad-teacher-index.jpg','target_url'=>'#','position'=>'6','title'=>'教师列表页Banner']);
        $this->insert('jx_advertisements', ['image_url'=>'/img/demo/ad-article-index.jpg','target_url'=>'#','position'=>'7','title'=>'文章列表页Banner']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/index-ban-01.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/index-ban-02.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/index-ban-03.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/ad-login-left.png']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/ad-register-left.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/ad-course-index.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/ad-teacher-index.jpg']);
        $this->delete('jx_advertisements',['image_url'=>'/img/demo/ad-article-index.jpg']);
    }
}
