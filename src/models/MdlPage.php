<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_pages".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $content
 * @property string|null $name
 * @property int $edit_mode
 */
class MdlPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'name'], 'string', 'max' => 255],
            [['edit_mode'], 'integer'],
            [['content'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'name' => 'Name',
        ];
    }
}
