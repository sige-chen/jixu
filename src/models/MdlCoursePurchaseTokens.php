<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_course_purchase_tokens".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $admin_id
 * @property string|null $token
 * @property int|null $status
 */
class MdlCoursePurchaseTokens extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_purchase_tokens';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'admin_id', 'status'], 'integer'],
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
            'course_id' => 'Course ID',
            'admin_id' => 'Admin ID',
            'token' => 'Token',
            'status' => 'Status',
        ];
    }
    
    /**
     * 获取密钥生成人
     * @return \app\models\MdlAdminUsers
     */
    public function getGenerator() {
        return MdlAdminUsers::findOne($this->admin_id);
    }
}
