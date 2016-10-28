<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "themes".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $path_name
 *
 * @property Config $config
 */
class Themes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'themes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'path_name'], 'required'],
            [['description'], 'string'],
            [['name', 'path_name'], 'string', 'max' => 50],
            [['path_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'path_name' => 'Path Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfig()
    {
        return $this->hasOne(Config::className(), ['theme' => 'path_name']);
    }
}
