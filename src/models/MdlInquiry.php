<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_inquiries".
 *
 * @property int $id ID
 * @property int $user_id 用户ID
 * @property string|null $name 姓名
 * @property string|null $phone 手机
 * @property string|null $qq QQ
 * @property string|null $sex 性别
 * @property string|null $message 留言
 * @property string|null $created_at 创建时间
 */
class MdlInquiry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_inquiries';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['created_at'], 'safe'],
            [['name', 'phone', 'qq', 'sex', 'message'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'phone' => 'Phone',
            'qq' => 'Qq',
            'sex' => 'Sex',
            'message' => 'Message',
            'created_at' => 'Created At',
        ];
    }
}
