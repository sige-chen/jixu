<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_videos".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $video_url
 * @property string|null $thunmnail_url
 * @property int|null $length
 * @property int|null $collection_id
 * @property int|null $index
 */
class MdlCourseVideos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['length', 'collection_id', 'index'], 'integer'],
            [['title', 'video_url', 'thunmnail_url'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 32],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'title' => '标题',
        ];
    }
}
