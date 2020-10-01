<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_company_partners".
 *
 * @property int $id ID
 * @property int $type 类型
 * @property string $name 名称
 * @property string $logo_url LOGO
 */
class MdlCompanyPartners extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_company_partners';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'name', 'logo_url'], 'required'],
            [['type'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['logo_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'name' => 'Name',
            'logo_url' => 'Logo Url',
        ];
    }
}
