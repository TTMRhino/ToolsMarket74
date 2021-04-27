<?php
namespace app\models;

use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    

    public static function tableName()
    {
        return 'orders';
    }

    public function rules()
    {
        return[

             [['item_id','customers_id','quantity','price'],'required'],
            [['item_id','customers_id','item'],'string'],
            [['price','total','quantity'],'number'],                      
        ];
    }
}