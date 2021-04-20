<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Orders
 * @package app\models
 * @property string $number
 * @property string $customer
 * @property string $order_name
 * @property integer $edition
 * @property string $billing
 * @property float $weight
 * @property string $packed_material_order
 */
class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'Orders';
    }

    public function rules()
    {
        return [
            [['number', 'customer', 'order_name', 'edition', 'billing'], 'required'],
            [['number', 'customer', 'order_name', 'billing', 'packed_material_order'], 'string'],
            [['edition'], 'integer'],
            [['weight'], 'double']
        ];
    }
}