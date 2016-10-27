<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "settings".
 *
 * @property integer $id
 * @property string $theme
 * @property string $paypal_id
 * @property string $from_email
 * @property string $contact_email
 * @property string $facebook_url
 * @property string $google_plus_url
 * @property string $twitter_url
 *
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
            [['theme'], 'string', 'max' => 10],
            [['paypal_id', 'from_email', 'contact_email', 'facebook_url', 'google_plus_url', 'twitter_url'], 'string', 'max' => 255],
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
            'paypal_id' => 'Paypal ID',
            'from_email' => 'From Email',
            'contact_email' => 'Contact Email',
            'facebook_url' => 'Facebook Url',
            'google_plus_url' => 'Google Plus Url',
            'twitter_url' => 'Twitter Url',
        ];
    }

}
