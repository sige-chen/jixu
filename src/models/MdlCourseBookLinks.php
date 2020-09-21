<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_book_links".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $link
 * @property string|null $thumbnail_url
 * @property string|null $source
 * @property float|null $price
 * @property int|null $course_id
 */
class MdlCourseBookLinks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_book_links';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'number'],
            [['course_id'], 'integer'],
            [['title', 'link', 'thumbnail_url', 'source'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'link' => 'Link',
            'thumbnail_url' => 'Thumbnail Url',
            'source' => 'Source',
            'price' => 'Price',
            'course_id' => 'Course ID',
        ];
    }
}
