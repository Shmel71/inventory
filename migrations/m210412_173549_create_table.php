<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%}}`.
 */
class m210412_173549_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('Stok', ['first_row' => $this->string(), 'second_row' => $this->integer()]);
        $this->createTable('Orders', ['number' => $this->integer(),'date' => $this->date(), 'order_name' => $this->string(), 'sender' => $this->string(), 'recipient' => $this->string()]);
        $this->createTable('Product', ['product_name' => $this->string(), 'properties' => $this->string(), 'weight' => $this->integer(), 'number_of_meters' => $this->integer()]);
    }

    /** ./yii migrate/down
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Stok');
        $this->dropTable('Orders');
        $this->dropTable('Product');
    }
}
