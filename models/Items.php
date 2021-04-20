<?php

namespace app\models;

use yii\db\ActiveRecord;

class Items extends ActiveRecord
{
    

    public static function tableName()
    {
        return 'items';
    }

    public function rules()
    {

        return [
            
            [['vendor','maingroup_id','subgroup_id','item','pur_price'], 'required'],
            [['vendor','maingroup_id','subgroup_id','item'],'string','max'=> 150],
            [['pur_price','price','old_price'],'double','min'=> 0, 'max'=>9999999],
            ['description','string','length' =>[0, 500]]          
           
        ];
    }

}