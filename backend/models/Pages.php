<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $created_at
 * @property string $updated_at
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'meta_title', 'meta_keywords'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'meta_title' => 'Meta Title',
            'meta_keywords' => 'Meta Keywords',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
