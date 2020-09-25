<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_banners".
 *
 * @property int $id
 * @property string|null $target
 * @property string|null $img_url
 * @property string|null $link
 */
class MdlBanners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_banners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['target', 'img_url', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'target' => 'Target',
            'img_url' => 'Img Url',
            'link' => 'Link',
        ];
    }
}
