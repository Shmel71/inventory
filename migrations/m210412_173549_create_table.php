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
        $this->createTable('Stock', ['product_number' => $this->string(), 'product_name' => $this->string(), 'unit_of_measure' => $this->string(), 'product_quantity' => $this->float()]);
        $this->createTable('Orders', ['number' => $this->string(),'customer' => $this->string(), 'order_name' => $this->string(), 'edition' => $this->integer(), 'billing' => $this->string(), 'weight' => $this->float(), 'packed_material_order' => $this->string()]);
        $this->createTable('Product', ['product_name' => $this->string(), 'properties' => $this->string(), 'weight' => $this->integer(), 'number_of_meters' => $this->integer()]);
    }

    /** ./yii migrate/down
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('Stock');
        $this->dropTable('Orders');
        $this->dropTable('Product');
    }
}
