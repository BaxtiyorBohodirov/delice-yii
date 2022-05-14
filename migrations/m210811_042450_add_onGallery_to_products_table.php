<?php

use yii\db\Migration;

/**
 * Class m210811_042450_add_onGallery_to_products_table
 */
class m210811_042450_add_onGallery_to_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('products', 'ponGallery', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210811_042450_add_onGallery_to_products_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210811_042450_add_onGallery_to_products_table cannot be reverted.\n";

        return false;
    }
    */
}
