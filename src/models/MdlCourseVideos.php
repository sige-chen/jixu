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
            [['length', 'collection_id'], 'integer'],
            [['title', 'video_url', 'thunmnail_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'video_url' => 'Video Url',
            'thunmnail_url' => 'Thunmnail Url',
            'length' => 'Length',
            'collection_id' => 'Collection ID',
        ];
    }
}
