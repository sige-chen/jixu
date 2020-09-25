<?php
namespace app\models;
use Yii;
use yii\web\IdentityInterface;
/**
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $photo_url
 * @property string $nickname
 */
class MdlUsers extends \yii\db\ActiveRecord implements IdentityInterface {
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'jx_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['email','email'],
            ['email','unique','message'=>'邮箱已被注册'],
            [['email','password'],'required'],
            [['email'],'string','max'=>64],
            [['password','nickname'],'string','max'=>32],
            [['photo_url'],'string','max'=>255],
        ];
    }
    
    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'email' => '邮箱',
        ];
    }
    
    /**
     * 获取有效用户数量
     * @return number
     */
    public static function getAvailableCount() {
        return self::find()->count();
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::findIdentity()
     */
    public static function findIdentity($id) {
        return self::findOne($id);
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::findIdentityByAccessToken()
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::getId()
     */
    public function getId() {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::getAuthKey()
     */
    public function getAuthKey() {
        
    }

    /**
     * {@inheritDoc}
     * @see \yii\web\IdentityInterface::validateAuthKey()
     */
    public function validateAuthKey($authKey) {
        
    }
}
