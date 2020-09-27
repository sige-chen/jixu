<?php
use yii\db\Migration;
/**
 * Class m200927_045752_create_table_jx_courses
 */
class m200927_045752_create_table_jx_courses extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_courses', [
            'id' => $this->primaryKey()->comment('ID'),
            'name' => $this->string(32)->notNull()->comment('名称'),
            'published_at' => $this->dateTime()->comment('上架时间'),
            'status' => $this->integer()->defaultValue(2)->comment('状态'),
            'thumbnail_url' => $this->string(255)->defaultValue('')->comment('封面图片'),
            'price' => $this->decimal(10,2)->defaultValue(0)->comment('价格'),
            'preferential_price' => $this->decimal(10,2)->defaultValue(0)->comment('优惠价格'),
            'description' => $this->text()->comment('描述'),
            'is_suggested' => $this->integer()->defaultValue(0)->comment('是否推荐'),
            'short_desc' => $this->string(255)->defaultValue('')->comment('简介'),
            'teacher_id' => $this->integer()->notNull()->comment('责任教师'),
            'short_name' => $this->string(255)->defaultValue('')->comment('简称'),
            'taobao_link' => $this->string(255)->defaultValue('#')->comment('淘宝链接'),
        ]);
        $this->addCommentOnTable('jx_courses', '课程表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_courses');
    }
}
