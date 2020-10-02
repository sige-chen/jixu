<?php

namespace app\models;

use Yii;
use app\helpers\JxDictionary;

/**
 * This is the model class for table "jx_course_talks".
 *
 * @property int $id
 * @property int|null $course_id
 * @property int|null $user_id
 * @property string|null $title
 * @property int|null $parent_id
 * @property string|null $content
 * @property string|null $created_time
 */
class MdlCourseTalks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_course_talks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['course_id', 'user_id', 'parent_id'], 'integer'],
            [['created_time'], 'safe'],
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
            'parent_id' => 'Parent ID',
            'content' => 'Content',
            'created_time' => 'Created Time',
        ];
    }
    
    /**
     * @return \app\models\MdlUsers
     */
    public function getUser() {
        return MdlUsers::findOne($this->user_id);
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
            if ( 0 == $this->parent_id ) {
                $calEvent->event = '发起讨论';
                $calEvent->type = JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_TALK_ASK');
            } else {
                $calEvent->event = '回复讨论';
                $calEvent->type = JxDictionary::value('CAL_EVENT_TYPE', 'COURSE_TALK_REPLY');
            }
            $calEvent->duration = 1;
            $calEvent->save();
        }
    }
}
