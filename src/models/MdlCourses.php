<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_courses".
 *
 * @property int $id ID
 * @property string $name 名称
 * @property string|null $published_at 上架时间
 * @property string $thumbnail_url
 * @property int $buy_count
 * @property int $mark_count
 * @property int $price
 * @property int $preferential_price
 * @property int $description
 * 
 * @property-read int $videoCollectionCount
 */
class MdlCourses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['published_at','buy_count','mark_count','price','preferential_price','description'], 'safe'],
            [['name','thumbnail_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'published_at' => 'Published At',
        ];
    }
    
    /**
     * @return number|string
     */
    public function getVideoCollectionCount() {
        return MdlCourseVideoCollections::find()->where(['course_id'=>$this->id])->count();
    }
}
