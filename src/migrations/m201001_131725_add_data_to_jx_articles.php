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
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'1','title'=>'Polkadot市值排名升至第五 超60亿美元','content'=>'系统通知001']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'1','title'=>'数据表明近期DOT价格能够预测ETH价格','content'=>'系统通知002']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'1','title'=>'波卡Web3基金会如何资助项目?项目如何深度参与波卡Polkdot生态?','content'=>'系统通知003']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'1','title'=>'Oppo将于下个月推出4K 120Hz电视','content'=>'系统通知004']);
        
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'2','title'=>'入行必看 | 互联网/IT行业职业方向', 'thumbnail_url'=>'/img/demo/article-thumbnail-001.jpg', 'summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'2','title'=>'临近年关，想在2018有更好的发展，必须要做到这几点', 'thumbnail_url'=>'/img/demo/article-thumbnail-001.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'2','title'=>'华信•迪科大数据学院揭牌成立：打造大数据应用人才的摇篮','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'2','title'=>'上联：大四入职长城软件，下联：毕业解决京籍户口！横批：可惜不是你！', 'thumbnail_url'=>'/img/demo/article-thumbnail-001.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'2','title'=>'道技相融，IT教育参加职业院校艺术设计类作品"广交会"！', 'thumbnail_url'=>'/img/demo/article-thumbnail-001.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'2','title'=>'长城学院双选会：你绽放的精彩里有我深情的一笔', 'thumbnail_url'=>'/img/demo/article-thumbnail-001.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'2','title'=>'年华正好，相聚趁早——你第一次回来，我理应隆重介绍', 'thumbnail_url'=>'/img/demo/article-thumbnail-001.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'【大咖来了】学IT只是走对了一小步，让他教你如何迈好未来的一大步', 'thumbnail_url'=>'/img/demo/article-thumbnail-002.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'解析 | 2017下半年IT行业快速发展的趋势', 'thumbnail_url'=>'/img/demo/article-thumbnail-002.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'无人机送快递，大势所趋', 'thumbnail_url'=>'/img/demo/article-thumbnail-002.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'最适合参加IT培训拿高薪的4类人群，有你吗？', 'thumbnail_url'=>'/img/demo/article-thumbnail-002.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'UI设计和ps培训哪个好?', 'thumbnail_url'=>'/img/demo/article-thumbnail-002.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'学员故事 | 为什么那个性格腼腆的男生变了?', 'thumbnail_url'=>'/img/demo/article-thumbnail-002.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'走出大学校园，走进真实企业化实训', 'thumbnail_url'=>'/img/demo/article-thumbnail-003.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
        $this->insert('jx_articles', ['date'=>date('Y-m-d'),'type'=>'3','title'=>'新年福运驾到：2018，和IT教育在一起！有事没事收大礼！', 'thumbnail_url'=>'/img/demo/article-thumbnail-002.jpg','summary'=>'如果你是学计算机的，将来想进入软件和互联网行业， 恭喜， 这是个好行业， 薪水很高， 也不需靠关系， 一切靠实力说话， 不需要有个好爸爸。坏处是，这个行业需要极为繁重的脑力和体力劳动，加班也是司空见惯的事情。']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_articles','1=1');
    }
}
