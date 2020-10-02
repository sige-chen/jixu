<?php
use yii\db\Migration;
/**
 * Class m201001_131725_add_data_to_jx_articles
 */
class m201001_131725_add_data_to_jx_articles extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_articles', ['type'=>'1','title'=>'Polkadot市值排名升至第五 超60亿美元','content'=>'系统通知001']);
        $this->insert('jx_articles', ['type'=>'1','title'=>'数据表明近期DOT价格能够预测ETH价格','content'=>'系统通知002']);
        $this->insert('jx_articles', ['type'=>'1','title'=>'波卡Web3基金会如何资助项目?项目如何深度参与波卡Polkdot生态?','content'=>'系统通知003']);
        $this->insert('jx_articles', ['type'=>'1','title'=>'Oppo将于下个月推出4K 120Hz电视','content'=>'系统通知004']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_articles',['type'=>1]);
    }
}
