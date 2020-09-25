<?php

namespace app\models;

use Yii;
use app\helpers\JxDictionary;

/**
 * This is the model class for table "jx_advertisements".
 *
 * @property int $id
 * @property string|null $image_url
 * @property string|null $target_url
 * @property int|null $position
 */
class MdlAdvertisements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_advertisements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['position'], 'integer'],
            [['image_url', 'target_url','title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_url' => 'Image Url',
            'target_url' => 'Target Url',
            'position' => 'Position',
        ];
    }
    
    /**
     * 获取指定位置的广告列表
     * @param string $position
     * @return \app\models\MdlAdvertisements[]
     */
    public static function getAdList( $position ) {
        $posVal = JxDictionary::value('AD_POSITION', $position);
        return self::find()->where(['position'=>$posVal])->orderBy(['id'=>SORT_DESC])->all();
    }
}
