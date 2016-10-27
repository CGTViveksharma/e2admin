<?php

use yii\db\Migration;

/**
 * Handles the creation of table `pages`.
 */
class m161027_094919_create_pages_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('pages', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100),
            'content' => $this->text(),
            'meta_title' => $this->string(100),
            'meta_keywords' => $this->string(100),
            'created_at' => $this->datetime(),
            'updated_at' => $this->timestamp(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('pages');
    }
}
