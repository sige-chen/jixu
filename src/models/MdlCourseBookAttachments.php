<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_book_attachments".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $download_url
 * @property int|null $course_id
 */
class MdlCourseBookAttachments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_book_attachments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id'], 'integer'],
            [['name', 'download_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '名称',
            'download_url' => 'Download Url',
            'course_id' => 'Course ID',
        ];
    }
}
