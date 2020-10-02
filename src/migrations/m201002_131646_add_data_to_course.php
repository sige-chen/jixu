<?php
use yii\db\Migration;
/**
 * Class m201002_131646_add_data_to_course
 */
class m201002_131646_add_data_to_course extends Migration {
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::up()
     */
    public function up() {
        $this->insert('jx_course_book_links', [
            'title'=>'Procreate零基础绘画教学教程iPad手绘插画课程笔刷色卡 原无奇变',
            'link' => 'https://item.taobao.com/item.htm?id=607520654831',
            'thumbnail_url' => 'https://gd3.alicdn.com/imgextra/i2/2132961131/O1CN01RdYdVw1KE2Zsg3EVm_!!2132961131.jpg',
            'source' => 1,
            'price' => 39.8,
            'course_id' => 1,
        ]);
        
        $this->insert('jx_course_book_attachments', [
            'name' => '厦门大学嘉庚学院动画专业人才培养方案',
            'download_url' => '/img/demo/course-book-001.pdf',
            'course_id' => 1,
        ]);
        
        $this->insert('jx_course_video_collections', [
            'course_id' => 1,
            'title' => '2020年 朱老师 直播视频录播',
            'introduction' => '2020年 朱老师直播视频录播的可能， 共25讲， 12课时。',
            'thumbnail_url' => '/img/demo/course-video-collection-thumbnail-001.png',
        ]);
        
        $this->insert('jx_course_videos', [
            'title' => 'course-video-001.mp4',
            'video_url' => '/img/demo/course-video-001.mp4',
            'thunmnail_url' => '/img/demo/course-video-thumbnail.jpg',
            'length' => 3,
            'collection_id' => 1,
            'index' => 1,
        ]);
        
        $this->insert('jx_course_tests', ['course_id'=>1,'title'=>'初始模拟试卷 - 技能检测']);
        $this->insert('jx_course_test_questions', [
            'course_id' => 1,
            'test_id' => 1,
            'type' => 1,
            'content' => 'CG 是哪个英文的缩写？',
            'options' => '{"A":"Cao Gao","B":"C++ G+","C":"tC tG","D":"ComG"}',
            'answer' => 'D',
            'tip' => '真真假假， 爱咋咋',
            'index' => 1,
        ]);
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\Migration::down()
     */
    public function down() {
        $this->truncateTable('jx_course_videos');
        $this->truncateTable('jx_course_video_collections');
        $this->truncateTable('jx_course_book_attachments');
        $this->truncateTable('jx_course_book_links');
        $this->truncateTable('jx_course_tests');
        $this->truncateTable('jx_course_test_questions');
    }
}
