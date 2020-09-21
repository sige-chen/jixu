<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "jx_admin_users".
 *
 * @property int $id ID
 * @property string $username 用户名
 * @property string $password 密码密文
 * @property string $email 邮箱
 * @property string $nickname 名称
 * @property string $photo_url 头像链接
 */
class MdlAdminUsers extends \yii\db\ActiveRecord implements IdentityInterface {
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_admin_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password','email'], 'required'],
            [['username', 'password','nickname'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 64],
            [['photo_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::findIdentity()
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::findIdentityByAccessToken()
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
        
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::getId()
     */
    public function getId()
    {
        return $this->id;
        
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::getAuthKey()
     */
    public function getAuthKey()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::validateAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->password === strtoupper(md5($authKey));
    }
}
