<?php


namespace app\models;


use yii\db\ActiveRecord;

/**
 * Class Product
 * @package app\models
 * @property string $product_name
 * @property string $properties
 * @property integer $weight
 * @property integer $number_of_meters
 *
 */

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'Product';
    }

    public function rules()
    {
        return [
            [['product_name', 'properties', 'weight', 'number_of_meters'], 'required'],
            [['product_name', 'properties'], 'string'],
            [['number_of_meters', 'weight'], 'integer']
        ];
    }
}