<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_user_calendar_events".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $date
 * @property string|null $time
 * @property string|null $event
 * @property string|null $type
 * @property string|null $duration
 */
class MdlUserCourseCalendarEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_user_course_calendar_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type','duration','course_id'], 'integer'],
            [['time','date'], 'safe'],
            [['event'], 'string', 'max' => 255],
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
            'time' => 'Time',
            'event' => 'Event',
        ];
    }
}
