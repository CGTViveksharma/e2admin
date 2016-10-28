<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $theme
 *
 * @property Themes $theme0
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'settings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['theme'], 'required'],
            [['theme'], 'string', 'max' => 50],
            [['theme'], 'unique'],
            [['theme'], 'exist', 'skipOnError' => true, 'targetClass' => Themes::className(), 'targetAttribute' => ['theme' => 'path_name']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'theme' => 'Theme',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTheme0()
    {
        return $this->hasOne(Themes::className(), ['path_name' => 'theme']);
    }
}
