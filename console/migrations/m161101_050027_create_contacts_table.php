<?php

use yii\db\Migration;

/**
 * Handles the creation of table `contacts`.
 */
class m161101_050027_create_contacts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('contacts', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'email' => $this->string(),
            'subject' => $this->string(),
            'message' => $this->text(),
            'created_at' => $this->datetime(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('contacts');
    }
}
