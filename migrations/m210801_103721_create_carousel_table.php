<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%carousel}}`.
 */
class m210801_103721_create_carousel_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%carousel}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'title_uz' => $this->string(),
            'title_en' => $this->string(),
            'title_ru' => $this->string(),
            'content_uz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
            'link' => $this->string(),
            'status' => $this->smallInteger(),
            'order' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%carousel}}');
    }
}
