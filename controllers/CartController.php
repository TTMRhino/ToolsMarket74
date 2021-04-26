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
        $item = Items::findOne(['id'=>$id]);
        
        if(empty($item)){
            return false; 
        }
        
        $session = \Yii::$app->session;
        $session->open();
        //$session->destroy();

        $cart = new Cart();
        $cart->addToCart($item);

        if(\Yii::$app->request->isAjax){           
            return $this->renderPartial('cartmini',compact($session));           
        }

        return $this->redirect(\Yii::$app->request->referrer);        
    }

    

    public function actionDelItem($id)
    {      
        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);
       

        if(\Yii::$app->request->isAjax){           
            return $this->renderPartial('cartmini',compact($session));           
        }
        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionShowTableCart($id, $qty=1)    
    {
        $session = \Yii::$app->session;
        $session->open();

        $cart = new Cart();
        $cart->recalc($id);
        

        if(\Yii::$app->request->isAjax){
           
            return $this->renderPartial('carttable',compact($session));
        }

        return $this->redirect(\Yii::$app->request->referrer);
    }

    public function actionChangeCart($id, $qty)
    {
        $item = Items::findOne(['id'=>$id]);
        
        if(empty($item)){
            return false; 
        }

        $session = \Yii::$app->session;
        $session->open();
        //$session->destroy();

        $cart = new Cart();
        $cart->addToCart($item, $qty);

        return $this->renderPartial('cartmini',compact($session));

    }
}