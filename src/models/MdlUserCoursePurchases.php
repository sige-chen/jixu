<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_user_course_purchases".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $course_id
 */
class MdlUserCoursePurchases extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_user_course_purchases';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'course_id'], 'integer'],
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
            'course_id' => 'Course ID',
        ];
    }
}
