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


    public function recalc($id)
    {
        if(!isset($_SESSION['cart'][$id])){
            return false;
        }

        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];

        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -=$sumMinus;

        
            unset($_SESSION['cart'][$id]);
        
    }
}