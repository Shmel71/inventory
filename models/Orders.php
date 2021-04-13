<?php


namespace app\models;



use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders';
    }

    public function rules()
    {
        return [
            [['number', 'date', 'order_name', 'sender', 'recipient'], 'required'],
            [['order_name', 'sender', 'recipient'], 'string'],
            [['number'], 'integer'],
            [['date'], 'date']
        ];
    }
}