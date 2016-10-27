<?php

use yii\db\Migration;

/**
 * Handles the creation of table `settings`.
 */
class m161027_104152_create_settings_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('settings', [
            'id' => $this->primaryKey(),
            'theme' => $this->string(20),
            'paypal_id' => $this->string(),
            'from_email' => $this->string(),
            'contact_email' => $this->string(),
            'facebook_url' => $this->string(),
            'google_plus_url' => $this->string(),
            'twitter_url' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('settings');
    }
}
