<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Stock
 * @package app\models
 * @property string $product_number
 * @property string $product_name
 * @property string $unit_of_measure
 * @property float $product_quantity
 */
class Stock extends ActiveRecord
{
    public static function tableName()
    {
        return 'Stock';
    }

    public function rules()
    {
        return [
            [['product_number', 'product_name'], 'required'],
            [['product_number', 'product_name', 'unit_of_measure'], 'string'],
            [['product_quantity'], 'double']
        ];
    }
}