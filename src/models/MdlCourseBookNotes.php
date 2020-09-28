<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_book_notes".
 *
 * @property int $id ID
 * @property int $course_id 课程ID
 * @property int $user_id 用户ID
 * @property int $page 页码
 * @property string $content 内容
 */
class MdlCourseBookNotes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_book_notes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id', 'page', 'content'], 'required'],
            [['course_id', 'user_id', 'page'], 'integer'],
            [['content'], 'string', 'max' => 512],
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
            'user_id' => 'User ID',
            'page' => 'Page',
            'content' => 'Content',
        ];
    }
}
