<?php
use yii\db\Migration;
/**
 * Class m201002_031245_add_data_to_jx_courses
 */
class m201002_031245_add_data_to_jx_courses extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_courses', [
            'name'=>'CG插画原画0基础入门',
            'published_at'=>date('Y-m-d H:i:s'),
            'status'=>'1',
            'thumbnail_url'=>'/img/demo/course-002.jpg',
            'price'=>'2999',
            'preferential_price'=>'1999',
            'description'=>'<img src="//10.url.cn/qqke_course_info/ajNVdqHZLLCDgzfmibGdx8Owjp2T3MvQlQQhKibNpmoSZjh3WFnjruamtMgGkMrYhBsV2poKINnibo/">',
            'is_suggested'=>'1',
            'short_desc'=>'长沙简学科技有限是一家网络在线教育培训机构，我们的办学理念是：塑造优质的课程，完善学员的技能水平，树立教育行业的标杆。 我们的宗旨是：一心做教育，二心做品质，三心做服务。 一次选择，一生改变。 你在哪里！我们愿做你的指路人。长沙简学教育科技有限公司期待你的到来！',
            'teacher_id'=>'2',
            'short_name'=>'CG插画原画0基础',
            'taobao_link'=>'https://detail.tmall.com/item.htm?id=558626763318'
        ]);
        $this->insert('jx_courses', [
            'name'=>'Java 0基础就业全系列公开课',
            'published_at'=>date('Y-m-d H:i:s'),
            'status'=>'1',
            'thumbnail_url'=>'/img/demo/course-001.jpg',
            'price'=>'5666',
            'preferential_price'=>'4666',
            'description'=>'<img src="//10.url.cn/qqke_course_info/ajNVdqHZLLCDgzfmibGdx8Owjp2T3MvQlQQhKibNpmoSZjh3WFnjruamtMgGkMrYhBsV2poKINnibo/">',
            'is_suggested'=>'1',
            'short_desc'=>'SPOTO思博软件学院隶属于福州思博网络科技有限公司（SPOTO思博），SPOTO思博软件学院专注于编程开发教育，成立于2007年，除了最基础的编程语言（C语言/C++/JAVA等）、数据库技术（SQL/ORACLE/DB2等）等，还有诸多如JAVASCRIPT、AJAX、HIBERNATE、SPRING等前沿技术等。',
            'teacher_id'=>'3',
            'short_name'=>'Java 0基础',
            'taobao_link'=>'https://detail.tmall.com/item.htm?id=558626763318'
        ]);
        $this->insert('jx_courses', [
            'name'=>'直播带货实训创业班',
            'published_at'=>date('Y-m-d H:i:s'),
            'status'=>'1',
            'thumbnail_url'=>'/img/demo/course-003.jpg',
            'price'=>'3576',
            'preferential_price'=>'2999',
            'description'=>'<img src="//10.url.cn/qqke_course_info/ajNVdqHZLLCDgzfmibGdx8Owjp2T3MvQlQQhKibNpmoSZjh3WFnjruamtMgGkMrYhBsV2poKINnibo/">',
            'is_suggested'=>'1',
            'short_desc'=>'闪卖网红学院是一家致力于培训孵化网红，培养直播带货人才的专业机构。公司于2016年开始涉足淘宝直播，后于2018年开始进军抖音直播带货，创造了120天0粉带货1800万的行业神话。2019年底场席卷全球的灾难重重打击了经济，公司决定将从业的经验与实操分享给更多的商家，帮助大家走出困境，为民族复兴努力',
            'teacher_id'=>'4',
            'short_name'=>'直播带货实训创业班',
            'taobao_link'=>'https://detail.tmall.com/item.htm?id=558626763318'
        ]);
        $this->insert('jx_courses', [
            'name'=>'【精品】日语零基础入门 五十音 根治发音问题',
            'published_at'=>date('Y-m-d H:i:s'),
            'status'=>'1',
            'thumbnail_url'=>'/img/demo/course-004.jpg',
            'price'=>'6099',
            'preferential_price'=>'5999',
            'description'=>'<img src="//10.url.cn/qqke_course_info/ajNVdqHZLLCDgzfmibGdx8Owjp2T3MvQlQQhKibNpmoSZjh3WFnjruamtMgGkMrYhBsV2poKINnibo/">',
            'is_suggested'=>'1',
            'short_desc'=>'蓝轨迹教育科技有限公司是一所线上网校，涵盖英语，日语，韩语三大板块，为国内外的语言学习者提供专业，有趣，高效，灵活的学习指导。截至2019年底，报名蓝轨迹课程的人数累计超过200万，是语言类唯一获得机构认证的线上教育公司。未来，我们会继续秉承“高质量课程，沉浸式学习，趣味性体验”的理念，提供更加优质的教学服',
            'teacher_id'=>'5',
            'short_name'=>'日语零基础入门',
            'taobao_link'=>'https://detail.tmall.com/item.htm?id=558626763318'
        ]);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->delete('jx_courses','1=1');
    }
}
