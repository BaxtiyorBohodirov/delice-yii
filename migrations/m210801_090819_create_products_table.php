<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%products_catalog}}`
 */
class m210801_090819_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'title_uz' => $this->string(),
            'title_en' => $this->string(),
            'title_ru' => $this->string(),
            'sub_content_uz' => $this->string(),
            'sub_content_ru' => $this->string(),
            'sub_content_en' => $this->string(),
            'content_uz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
            'price' => $this->integer(),
            'catalog_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'order' => $this->integer(),
        ]);

        // creates index for column `catalog_id`
        $this->createIndex(
            '{{%idx-products-catalog_id}}',
            '{{%products}}',
            'catalog_id'
        );

        // add foreign key for table `{{%products_catalog}}`
        $this->addForeignKey(
            '{{%fk-products-catalog_id}}',
            '{{%products}}',
            'catalog_id',
            '{{%products_catalog}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%products_catalog}}`
        $this->dropForeignKey(
            '{{%fk-products-catalog_id}}',
            '{{%products}}'
        );

        // drops index for column `catalog_id`
        $this->dropIndex(
            '{{%idx-products-catalog_id}}',
            '{{%products}}'
        );

        $this->dropTable('{{%products}}');
    }
}
