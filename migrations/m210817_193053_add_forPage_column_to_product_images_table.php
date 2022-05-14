<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%product_images}}`.
 */
class m210817_193053_add_forPage_column_to_product_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%product_images}}', 'forPage', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%product_images}}', 'forPage');
    }
}
