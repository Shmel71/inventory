<?php


namespace app\models;


use yii\db\ActiveRecord;

class Stock extends ActiveRecord
{
    public static function tableName()
    {
        return 'stock';
    }

    public function rules()
    {
        return [
            [['first_row', 'second_row'], 'required']
        ];
    }
}