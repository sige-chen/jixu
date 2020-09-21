<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "jx_admin_password_reset_tokens".
 *
 * @property int $id ID
 * @property int $user_id 用户ID
 * @property string $token Token
 * @property string $expired_at 过期时间
 */
class MdlAdminPasswordResetTokens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_admin_password_reset_tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'token', 'expired_at'], 'required'],
            [['user_id','expired_at'], 'integer'],
            [['token'], 'string', 'max' => 32],
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
