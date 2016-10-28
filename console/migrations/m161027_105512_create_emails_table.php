<?php

use yii\db\Migration;

/**
 * Handles the creation of table `emails`.
 */
class m161027_105512_create_emails_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('emails', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'subject' => $this->string(),
            'body' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('emails');
    }
}
