<?php
use yii\db\Migration;
/**
 * Class m201002_003503_add_data_to_jx_admin_users
 */
class m201002_003503_add_data_to_jx_admin_users extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_admin_users', ['username'=>'teacher-001','password'=>md5('123456'),'email'=>'teacher001@example.com','nickname'=>'滕振开','photo_url'=>'/img/demo/teacher-001.jpg','type'=>1,'title'=>'专家级实训导师','introduction'=>'8年工作经历，5.5年Java开发从业经历，2.5年软件测试从业经历。曾担任神州数码科技发展有限公司、IT教育教育技术有限公司、明讯无忧科技有限责任公司、灵图软件技术有限公司等的软件开发工程师。参与或主持过的部分项目包括：神州数码“金税三期”税库银项目和咨询项目、明讯无忧中企动力销售管理系统、客户关系管理系统软件开发项目、IT教育“发明专利”项目等。']);
        $this->insert('jx_admin_users', ['username'=>'teacher-002','password'=>md5('123456'),'email'=>'teacher002@example.com','nickname'=>'宋传玉','photo_url'=>'/img/demo/teacher-002.jpg','type'=>1,'title'=>'软件开发项目经理 高级工程师等职位 知名教育机构高级Java讲师','introduction'=>'8年软件研发和项目管理的从业经验，多年Java教学经验。曾在力铭科技、灵图星讯、中信网络等多家公司担任软件开发项目经理、高级工程师等职位，并在多家知名教育机构担任高级Java讲师。']);
        $this->insert('jx_admin_users', ['username'=>'teacher-003','password'=>md5('123456'),'email'=>'teacher003@example.com','nickname'=>'冯德智','photo_url'=>'/img/demo/teacher-003.jpg','type'=>1,'title'=>'专家级实训导师','introduction'=>'8年Java开发经验，3年项目管理一年it培训讲师经验。曾任职企业及职务清华大学计算中心首席软件开发工程师，信和惠民软件开发工程师。国内知名大学校园一卡通；央企大型装备信息化管理平台；央企节能减排管理平台。']);
        $this->insert('jx_admin_users', ['username'=>'teacher-004','password'=>md5('123456'),'email'=>'teacher004@example.com','nickname'=>'徐昀','photo_url'=>'/img/demo/teacher-004.jpg','type'=>1,'title'=>'专家级实训导师','introduction'=>'主持参与过众多软硬件项目开发，如：基于Qchat的出租车调度系统，航天部下属多个子公司的呼叫中心座席平台，气象局114系统等。']);
        $this->insert('jx_admin_users', ['username'=>'teacher-005','password'=>md5('123456'),'email'=>'teacher005@example.com','nickname'=>'黄薇','photo_url'=>'/img/demo/teacher-005.jpg','type'=>1,'title'=>'UI设计高级讲师','introduction'=>'毕业于澳大利亚巴拉瑞特大学，5年UI行业从业经验。客户遍及国内外，涵盖政府部门、食品企业、服装行业、教育研究院、智能软件企业及创业公司等。工作内容包括企业APP UI设计与优化、VI设计、网页设计、绩效考评方案等。参与主导过众多APP及网页UI设计项目，曾作为项目经理，主持过e家APP UI项目，荟策商务信息咨询有限公司LOGO及VI项目、北京某研究院LOGO项目、成都苏杰士艺术拍卖网页UI设计项目等。根据客户实际情况，为客户定制方案，成功解决客户问题。']);
        $this->insert('jx_admin_users', ['username'=>'teacher-006','password'=>md5('123456'),'email'=>'teacher006@example.com','nickname'=>'刘哲','photo_url'=>'/img/demo/teacher-006.jpg','type'=>1,'title'=>'UI设计高级讲师','introduction'=>'中国高校美术家协会理事、北京市高级教师。十年工作经历，曾任北京吉利大学数字媒体讲师，并在多家教育培训机构担任UI设计讲师。曾多次参加国家级动漫大赛并获奖，曾与北京科学技术出版社合作出版《聊斋志异》；与中国少年儿童杂志社合作，出版《中国少年儿童》杂志期刊，动漫原创作品入编“21世纪高等学校美术与设计专业规划教材《动画造型基础》一书。另外，多次组织并指导学生参加国家级、省级动漫大赛和学科技能大赛，并取得优异成绩。']);
        $this->insert('jx_admin_users', ['username'=>'teacher-007','password'=>md5('123456'),'email'=>'teacher007@example.com','nickname'=>'李冠一','photo_url'=>'/img/demo/teacher-007.jpg','type'=>1,'title'=>'网络营销总监级讲师','introduction'=>'多年从事网络营销教学，SEO、SEM、网络推广，社会化媒体营销等经验丰富。']);
        $this->insert('jx_admin_users', ['username'=>'teacher-008','password'=>md5('123456'),'email'=>'teacher008@example.com','nickname'=>'周健','photo_url'=>'/img/demo/teacher-008.jpg','type'=>1,'title'=>'资深UI设计师 资深用户体验专家','introduction'=>'从事设计工作10年以上，资深UI设计师。曾担任腾讯、易宝支付等知名公司UI设计师。有丰富的项目经验，参与项目：intel IDF、2014华为互联网大会、奔驰CLA、奥迪Q7上市、奥迪A7等。']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_admin_users','1=1');
    }
}
