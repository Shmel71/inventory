<?php


namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{
    public static function tableName()
    {
        return 'product';
    }

    public function rules()
    {
        return [
            [['product_name', 'properties', 'weight', 'number_of_meters'], 'required'],
            [['product_name', 'properties', 'weight', ], 'string'],
            [['number_of_meters'], 'integer']
        ];
    }
}