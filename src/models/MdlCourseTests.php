<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_tests".
 *
 * @property int $id
 * @property int|null $course_id
 * @property string|null $title
 * @property int $question_count
 */
class MdlCourseTests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_tests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id','question_count'], 'integer'],
            [['title'], 'string', 'max' => 255],
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
}
