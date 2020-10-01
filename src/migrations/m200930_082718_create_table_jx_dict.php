<?php
use yii\db\Migration;
/**
 * Class m200930_082718_create_table_jx_dict
 */
class m200930_082718_create_table_jx_dict extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->createTable('jx_dict', [
            'id' => $this->primaryKey()->comment('ID'),
            'group' => $this->string(64)->comment('分组'),
            'group_name' => $this->string(64)->comment('分组名'),
            'key' => $this->string(64)->comment('键'),
            'key_name' => $this->string(64)->comment('键名'),
            'value' => $this->string(64)->comment('值'),
            'value_name' => $this->string(64)->comment('值名'),
        ]);
        $this->addCommentOnTable('jx_dict', '系统字典表');
        
        $this->insert('jx_dict', ['group'=>'COURSE_BOOK_LINK_SOURCE','group_name'=>'教材链接来源','key'=>'TAOBAO','key_name'=>'淘宝','value'=>'1','value_name'=>'淘宝']);
        $this->insert('jx_dict', ['group'=>'COURSE_BOOK_LINK_SOURCE','group_name'=>'教材链接来源','key'=>'TMALL','key_name'=>'天猫','value'=>'2','value_name'=>'天猫']);
        $this->insert('jx_dict', ['group'=>'COURSE_BOOK_LINK_SOURCE','group_name'=>'教材链接来源','key'=>'JD','key_name'=>'京东','value'=>'3','value_name'=>'京东']);
        $this->insert('jx_dict', ['group'=>'COURSE_STATUS','group_name'=>'课程状态','key'=>'ONSELL','key_name'=>'销售中','value'=>'1','value_name'=>'销售中']);
        $this->insert('jx_dict', ['group'=>'COURSE_STATUS','group_name'=>'课程状态','key'=>'SOLDOUT','key_name'=>'下架','value'=>'2','value_name'=>'下架']);
        $this->insert('jx_dict', ['group'=>'COURSE_STATUS','group_name'=>'课程状态','key'=>'DELETED','key_name'=>'已删除','value'=>'3','value_name'=>'已删除']);
        $this->insert('jx_dict', ['group'=>'ARTICLE_TYPE','group_name'=>'文章类型','key'=>'NOTI','key_name'=>'通知','value'=>'1','value_name'=>'通知']);
        $this->insert('jx_dict', ['group'=>'ADMIN_USER_TYPE','group_name'=>'管理员类型','key'=>'TEACHER','key_name'=>'教师','value'=>'1','value_name'=>'教师']);
        $this->insert('jx_dict', ['group'=>'ARTICLE_TYPE','group_name'=>'文章类型','key'=>'ABOUT_COM','key_name'=>'关于企业','value'=>'2','value_name'=>'关于企业']);
        $this->insert('jx_dict', ['group'=>'ARTICLE_TYPE','group_name'=>'文章类型','key'=>'ABOUT_NEWS','key_name'=>'新闻动态','value'=>'3','value_name'=>'新闻动态']);
        $this->insert('jx_dict', ['group'=>'PAGE_EDIT_MODE','group_name'=>'页面编辑模式','key'=>'SRC','key_name'=>'源码','value'=>'1','value_name'=>'源码']);
        $this->insert('jx_dict', ['group'=>'PAGE_EDIT_MODE','group_name'=>'页面编辑模式','key'=>'DOC','key_name'=>'文档','value'=>'2','value_name'=>'文档']);
        $this->insert('jx_dict', ['group'=>'AD_POSITION','group_name'=>'广告位置','key'=>'ARTICLE_LIST_RIGHT','key_name'=>'文章列表右侧','value'=>'1','value_name'=>'文章列表右侧']);
        $this->insert('jx_dict', ['group'=>'AD_POSITION','group_name'=>'广告位置','key'=>'LOGIN_LEFT','key_name'=>'登录页面左侧','value'=>'2','value_name'=>'登录页面左侧']);
        $this->insert('jx_dict', ['group'=>'AD_POSITION','group_name'=>'广告位置','key'=>'REGISTER_LEFT','key_name'=>'注册页面左侧','value'=>'3','value_name'=>'注册页面左侧']);
        $this->insert('jx_dict', ['group'=>'AD_POSITION','group_name'=>'广告位置','key'=>'INDEX_BANNER','key_name'=>'首页Banner','value'=>'4','value_name'=>'首页Banner']);
        $this->insert('jx_dict', ['group'=>'CAL_EVENT_TYPE','group_name'=>'日历事件','key'=>'COURSE_CARD','key_name'=>'添加卡片','value'=>'1','value_name'=>'添加卡片']);
        $this->insert('jx_dict', ['group'=>'CAL_EVENT_TYPE','group_name'=>'日历事件','key'=>'COURSE_TALK_ASK','key_name'=>'发起讨论','value'=>'2','value_name'=>'发起讨论']);
        $this->insert('jx_dict', ['group'=>'CAL_EVENT_TYPE','group_name'=>'日历事件','key'=>'COURSE_TALK_REPLY','key_name'=>'回复讨论','value'=>'3','value_name'=>'回复讨论']);
        $this->insert('jx_dict', ['group'=>'CAL_EVENT_TYPE','group_name'=>'日历事件','key'=>'COURSE_NOTE_ADD','key_name'=>'添加笔记','value'=>'4','value_name'=>'添加笔记']);
        $this->insert('jx_dict', ['group'=>'CAL_EVENT_TYPE','group_name'=>'日历事件','key'=>'COURSE_TEST_TESTING','key_name'=>'试题测试','value'=>'5','value_name'=>'试题测试']);
        $this->insert('jx_dict', ['group'=>'CAL_EVENT_TYPE','group_name'=>'日历事件','key'=>'COURSE_VIDEO_WATCHING','key_name'=>'观看视频','value'=>'6','value_name'=>'观看视频']);
        $this->insert('jx_dict', ['group'=>'CAL_EVENT_TYPE','group_name'=>'日历事件','key'=>'COURSE_BOOK_READING','key_name'=>'教材阅读','value'=>'7','value_name'=>'教材阅读']);
        $this->insert('jx_dict', ['group'=>'COURSE_TEST_QUESTION_TYPE','group_name'=>'试题类型','key'=>'SINGLE_SELECTION','key_name'=>'单选','value'=>'1','value_name'=>'单选']);
        $this->insert('jx_dict', ['group'=>'COURSE_TEST_QUESTION_TYPE','group_name'=>'试题类型','key'=>'MULTI_SELECTION','key_name'=>'多选','value'=>'2','value_name'=>'多选']);
        $this->insert('jx_dict', ['group'=>'COURSE_TEST_QUESTION_TYPE','group_name'=>'试题类型','key'=>'SHORT_ANSWER','key_name'=>'简答','value'=>'3','value_name'=>'简答']);
        $this->insert('jx_dict', ['group'=>'ADMIN_USER_TYPE','group_name'=>'管理员类型','key'=>'UNKOWN','key_name'=>'未指定','value'=>'0','value_name'=>'未指定']);
        $this->insert('jx_dict', ['group'=>'COURSE_TOKEN_STATUS','group_name'=>'课程密钥状态','key'=>'NEW','key_name'=>'新建','value'=>'0','value_name'=>'新建']);
        $this->insert('jx_dict', ['group'=>'COURSE_TOKEN_STATUS','group_name'=>'课程密钥状态','key'=>'USED','key_name'=>'已使用','value'=>'1','value_name'=>'已使用']);
        
        $this->insert('jx_dict', ['group'=>'COMPANY_PART_TYPE','group_name'=>'企业合作者类型','key'=>'COMPANY','key_name'=>'企业','value'=>'1','value_name'=>'企业']);
        $this->insert('jx_dict', ['group'=>'COMPANY_PART_TYPE','group_name'=>'企业合作者类型','key'=>'SCHOOL','key_name'=>'学校','value'=>'2','value_name'=>'学校']);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->dropTable('jx_dict');
    }
}
