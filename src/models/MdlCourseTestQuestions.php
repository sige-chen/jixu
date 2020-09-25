<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_test_questions".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $test_id
 * @property int|null $type
 * @property string|null $content
 * @property string|null $options
 * @property string|null $answer
 * @property string|null $tip
 * @property int|null $index
 */
class MdlCourseTestQuestions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_test_questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'test_id', 'type', 'index'], 'integer'],
            [['content', 'options', 'answer', 'tip'], 'string', 'max' => 255],
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
            'test_id' => 'Test ID',
            'type' => 'Type',
            'content' => 'Content',
            'options' => 'Options',
            'answer' => 'Answer',
            'tip' => 'Tip',
            'index' => 'Index',
        ];
    }
}
