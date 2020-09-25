<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_user_course_cards".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $content
 */
class MdlUserCourseCards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_user_course_cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
}
