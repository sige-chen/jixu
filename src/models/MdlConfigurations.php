<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_configurations".
 *
 * @property int $id ID
 * @property string $key 键名
 * @property string|null $value 键值
 * @property string|null $note 说明
 */
class MdlConfigurations extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_configurations';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key'], 'string', 'max' => 64],
            [['value'], 'string', 'max' => 1024],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'note' => 'Note',
        ];
    }
}
