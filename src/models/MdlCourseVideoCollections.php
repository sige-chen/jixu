<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_video_collections".
 *
 * @property int $id ID
 * @property int $course_id 课程ID
 * @property string|null $title 标题
 */
class MdlCourseVideoCollections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_video_collections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id'], 'required'],
            [['course_id'], 'integer'],
            [['title','introduction','thumbnail_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'course_id' => 'Course ID',
            'title' => 'Title',
        ];
    }
    
    public function getVideoCount() {
        return 0;
    }
}
