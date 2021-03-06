<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jx_articles".
 *
 * @property int $id
 * @property int|null $type
 * @property string|null $title
 * @property string|null $summary
 * @property string|null $content
 * @property int|null $status
 */
class MdlArticles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jx_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'status'], 'integer'],
            [['title', 'summary', 'thumbnail_url'], 'string', 'max' => 255],
            
            [['content','date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'title' => 'Title',
            'summary' => 'Summary',
            'content' => '内容',
            'status' => 'Status',
        ];
    }
}
