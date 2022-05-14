<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_details}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%products}}`
 */
class m210801_092905_create_product_details_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_details}}', [
            'id' => $this->primaryKey(),
            'title_uz' => $this->string(),
            'title_en' => $this->string(),
            'title_ru' => $this->string(),
            'content_uz' => $this->text(),
            'content_ru' => $this->text(),
            'content_en' => $this->text(),
            'product_id' => $this->integer(),
            'status' => $this->smallInteger(),
            'order' => $this->integer(),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-product_details-product_id}}',
            '{{%product_details}}',
            'product_id'
        );

        // add foreign key for table `{{%products}}`
        $this->addForeignKey(
            '{{%fk-product_details-product_id}}',
            '{{%product_details}}',
            'product_id',
            '{{%products}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%products}}`
        $this->dropForeignKey(
            '{{%fk-product_details-product_id}}',
            '{{%product_details}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-product_details-product_id}}',
            '{{%product_details}}'
        );

        $this->dropTable('{{%product_details}}');
    }
}
