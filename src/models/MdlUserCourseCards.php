<?php

namespace app\models;

use Yii;
use app\helpers\JxDictionary;

/**
 * This is the model class for table "jx_user_course_cards".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $content
 */
class MdlUserCourseCards extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_user_course_cards';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id'], 'integer'],
            [['title', 'content'], 'string', 'max' => 255],
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
            'user_id' => 'User ID',
            'title' => 'Title',
            'content' => 'Content',
        ];
    }
    
    /**
     * {@inheritDoc}
     * @see \yii\db\BaseActiveRecord::afterSave()
     */
    public function afterSave($insert, $changedAttributes) {
        parent::afterSave($insert, $changedAttributes);
        if ( $insert ) {
            $calEvent = new MdlUserCourseCalendarEvents();
            $calEvent->course_id = $this->course_id;
            $calEvent->user_id = \Yii::$app->user->id;
            $calEvent->date = date('Y-m-d');
            $calEvent->time = date('H:i:s');
            $calEvent->event = '添加卡片';
            $calEvent->type = JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_CARD');
            $calEvent->duration = 1;
            $calEvent->save();
        }
    }
}
