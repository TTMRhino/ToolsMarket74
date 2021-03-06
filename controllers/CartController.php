<?php

namespace app\controllers;

use app\models\Items;
use app\models\Cart;
use app\models\Order;
use app\models\Customers;


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
           
            return $this->renderPartial('cartTable',compact($session));
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

    public function actionCheckout()
    {
        $session = \Yii::$app->session;
        $session->open();

        $order = new Order();
        $customer = new Customers();

        if ($customer->load(\Yii::$app->request->post()) ){

            $transaction = \Yii::$app->getDb()->beginTransaction();

           if(!$customer->save() || !$order->saveOrder($session['cart'], $customer->id)){
               \Yii::$app->session->setFlash('error','???????????? ???????????????????? ????????????');
                $transaction->rollBack();
           }else{            
               $transaction->commit();
               \Yii::$app->session->setFlash('success','?????? ?????????? ????????????!');

               try{
                \Yii::$app->mailer->compose('order',['session' => $session])
                ->setFrom([\Yii::$app->params['senderEmail'] => \Yii::$app->params['senderName'] ])
                ->setTo(\Yii::$app->params['adminEmail'])
                ->setSubject('?????????? Electro74')
                ->send();
               }catch (\Swift_TransportException $e){
                var_dump($e);die;
               }
              

               $session->remove('cart');
               $session->remove('cart.qty');
               $session->remove('cart.sum');

               return $this->refresh();
           }
           
        }

        return $this->render('checkout',compact('session', 'order', 'customer'));
    }
}