<?php
use yii\db\Migration;
/**
 * Class m201001_081532_create_table_jx_company_partners
 */
class m201001_081532_create_table_jx_company_partners extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_company_partners', [
            'id' => $this->primaryKey()->comment('ID'),
            'type' => $this->integer()->notNull()->comment('类型'),
            'name' => $this->string(64)->notNull()->comment('名称'),
            'logo_url' => $this->string(255)->notNull()->comment('LOGO'),
        ]);
        $this->addCommentOnTable('jx_company_partners', '企业合作表');
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_company_partners');
    }
}
