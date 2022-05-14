<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products_catalog}}`.
 */
class m210801_090704_create_products_catalog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products_catalog}}', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_en' => $this->string(),
            'title_ru' => $this->string(),
            'status' => $this->smallInteger(),
            'order' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products_catalog}}');
    }
}
