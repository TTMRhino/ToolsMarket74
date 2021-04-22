<?php if(isset($_SESSION['cart'])): ?>
    <?php foreach($_SESSION['cart'] as $cartItem): ?>
         <!-- Cart Box Start -->
         <div class="single-cart-box">
            <div class="cart-img">
                <a href="#"><img src="/img/menu/1.jpg" alt="cart-image"></a>
            </div>
            <div class="cart-content">
                <h6><a href="product.html"><?= $cartItem['title'] ?></a></h6>
                <span><?= $cartItem['qty'] ?> × <?= $cartItem['price'] ?></span>
            </div>
            <a class="del-icone" href="#" data-id="<?= $cartItem['id'] ?>"><i class="fa fa-window-close-o"></i></a>
        </div>
        <!-- Cart Box End -->

    <?php endforeach ?>
<?php endif ?>
                                                       