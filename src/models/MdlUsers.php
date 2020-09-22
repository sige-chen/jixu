<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_users".
 *
 * @property int $id
 */
class MdlUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
        ];
    }
    
    public static function getAvailableCount() {
        return self::find()->count();
    }
}
