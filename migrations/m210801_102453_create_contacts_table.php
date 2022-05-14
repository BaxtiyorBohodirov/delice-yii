<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contacts}}`.
 */
class m210801_102453_create_contacts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contacts}}', [
            'id' => $this->primaryKey(),
            'adress_uz' => $this->string(),
            'adress_ru' => $this->string(),
            'adress_en' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'facebook' => $this->string(),
            'telegram' => $this->string(),
            'instagram' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contacts}}');
    }
}
