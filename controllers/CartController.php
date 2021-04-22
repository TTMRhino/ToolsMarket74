<?php

namespace app\controllers;

use app\models\Items;
use app\models\Cart;


class CartController extends AppController
{
    public function actionIndex()
    {
        return $this->render('cart');
    }

    public function actionAdd($id)
    {
        $item = Items::findOne([$id]);
        if(empty($item)){
            return false; 
        }

        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->addToCart($item);

        if(\Yii::$app->request->isAjax){
            return $this->renderPartial('cartmini',compact($session));
        }

        return $this->redirect(\Yii::$app->request->referrer);

    }
}