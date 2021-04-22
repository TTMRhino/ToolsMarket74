<?php
namespace app\models;

use yii\base\Model;

class Cart extends Model
{
    public function addToCart($item, $qty = 1 )
    {
        if(isset($_SESSION['cart'][$item->id])){
            $_SESSION['cart'][$item->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$item->id] = [
                'id' => $item->id,
                'title' => $item->item,
                'price' => $item->price,
                'qty' => $qty,
                'vendor' => $item->vendor
            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;

        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $item->price : $qty * $item->price;
    }
}