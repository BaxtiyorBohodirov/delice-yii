<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news1}}`.
 */
class m210801_101026_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'title_uz' => $this->string(),
            'title_en' => $this->string(),
            'title_ru' => $this->string(),
            'sub_content_uz' => $this->text(),
            'sub_content_ru' => $this->text(),
            'sub_content_en' => $this->text(),
            'content_uz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger(),
            'order' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }
}
