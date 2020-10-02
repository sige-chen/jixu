<?php
use yii\db\Migration;
/**
 * Class m201001_130904_alter_table_jx_articles_change_content_to_longtext
 */
class m201001_130904_alter_table_jx_articles_change_content_to_longtext extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->alterColumn('jx_articles', 'content', 'LONGTEXT');
        $this->addCommentOnColumn('jx_articles', 'content', '内容');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->alterColumn('jx_articles', 'content', $this->string());
    }
}
