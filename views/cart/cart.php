<?php 
use yii\helpers\Url;
?>
<!-- Cart Main Area Start -->
<div class="cart-main-area pb-80 pb-sm-50">
            <div class="container">
               <h2 class="text-capitalize sub-heading">cart</h2>
                <div class="row" >
                    <div class="col-md-12">
                    <?php if(!empty($_SESSION['cart'])): ?>
                        <!-- Form Start -->
                        <form action="#" id="table">
                            <!-- Table Content Start -->
                            <div class="table-content table-responsive mb-50" >
                                <div class="cart-table">
                                    <div class="overlay">
                                        <i class="fa fa-refresh fa-spin"></i>
                                    </div>
                                    <table >
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Image</th>
                                                <th class="product-name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-subtotal">Total</th>
                                                <th class="product-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($_SESSION['cart'] as $item):?>
                                            <tr>
                                                <td class="product-thumbnail">
                                                    <a href="#"><img src="/img/products/1.jpg" alt="cart-image" /></a>
                                                </td>
                                                <td class="product-name"><a href="#"><?= $item['title'] ?></a></td>
                                                <td class="product-price"><span class="amount"><?= $item['price'] ?>р.</span></td>

                                                <td class="product-quantity" id="tableId">
                                                    <button type="button" data-qty="1" data-id="<?= $item['id']?>" class="btn btn-light plus">+</button>
                                                        <input id="count<?= $item['id'] ?>" 
                                                            data-id="<?= $item['id']?>"
                                                            type="text" value="<?= $item['qty'] ?>" />
                                                    <button type="button"  class="btn btn-light minus" data-qty="-1" data-id="<?= $item['id']?>">-</button>                                                
                                                </td>

                                                <td class="product-subtotal"><?= $item['price'] * $item['qty'] ?></td>
                                                <td class="product-remove " > 
                                                <a href="<?= Url::to(['cart/del-item', 'id'=>$item['id'] ]) ?>" 
                                                    class="delete" data-id="<?= $item['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Table Content Start -->
                            <div class="row">
                               <!-- Cart Button Start -->
                                <div class="col-lg-8 col-md-7">
                                   
                                </div>
                                <!-- Cart Button Start -->
                                <!-- Cart Totals Start -->
                                <div class="col-lg-4 col-md-12">
                                    <div class="cart_totals">
                                        <h2>итого</h2>
                                        <br />
                                        <table>
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount">$215.00</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Всего:</th>
                                                    <td>
                                                        <strong><span class="amount"><?= $_SESSION['cart.sum'] ?> руб.</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="wc-proceed-to-checkout">
                                            <a href="#">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Cart Totals End -->
                            </div>
                            <!-- Row End -->
                        </form>
                        <!-- Form End -->
                    <?php else: ?>
                        <h3>Корзина пуста.</h3>
                    <?php endif ?>
                    </div>
                </div>
                 <!-- Row End -->
            </div>
        </div>
        <!-- Cart Main Area End -->