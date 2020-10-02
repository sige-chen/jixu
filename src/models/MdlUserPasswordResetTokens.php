<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_user_password_reset_tokens".
 *
 * @property int $id ID
 * @property string $user_id 用户ID
 * @property string $token 密钥
 * @property int $expired_at 过期时间
 */
class MdlUserPasswordResetTokens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_user_password_reset_tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['user_id','integer'],
            [['user_id', 'token', 'expired_at'], 'required'],
            [['expired_at'], 'integer'],
            [['token'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'token' => 'Token',
            'expired_at' => 'Expired At',
        ];
    }
}
