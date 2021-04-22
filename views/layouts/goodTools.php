<?php
use app\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">


<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

   
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>



    <meta name="description" content="Default Description">
   
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon/favicon.png">

       
    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>

    <!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Wrapper Start -->
    <div class="wrapper homepage">
        
        <!-- Newsletter Popup End -->
        <!-- Header Area Start -->
        <header>
            <!-- Header Top Start -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Header Top left Start -->                        
                        <div class="col-lg-4 col-md-12 d-center">
                            <div class="header-top-left">
                                <img src="img/icon/call.png" alt="">Call Us : +11 222 3333
                            </div>                        
                        </div>
                        <!-- Header Top left End -->

                        <!-- Search Box Start -->                                        
                        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                            <div class="search-box-view">
                                <form action="<?= Url::to('shop/search', $schema = true) ?>" method="get">
                                    <input type="text" class="email" placeholder="Search Your Product" name="q">
                                    <button type="submit" class="submit"></button>
                                </form>
                            </div>                                           
                        </div>
                        <!-- Search Box End -->

                        <!-- Header Top Right Start -->                                       
                        <div class="col-lg-4 col-md-12">
                            <div class="header-top-right">
                                
                                <!-- Header-list-menu End -->
                            </div>
                        </div>
                        <!-- Header Top Right End -->
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Top End -->
            <!-- Header Bottom Start -->
            <div class="header-bottom header-sticky">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-2 col-sm-5 col-5">
                            <div class="logo">
                                <a href="<?= Url::home()?>"><img src="/img/logo/logo.png" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Primary Vertical-Menu End -->
                        <!-- Search Box Start -->
                        <div class="col-xl-6 col-lg-7 d-none d-lg-block">
                            <div class="middle-menu pull-right">
                                <nav>
                                    <ul class="middle-menu-list">
                                        <li><a href="<?= Url::home() ?>">Домой<i class="fa "></i></a>
                                          
                                        </li>
                                        <li><a href="about.html">О нас</a></li>                                        
                                        <li><a href="<?= Url::toRoute('shop/index', $schema = true) ?>">Товары<i class="fa"></i></a></li>                                        
                                      
                                        
                                        <li><a href="contact.html">Контакты</a></li>                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Search Box End -->
                        <!-- Cartt Box Start -->
                        <div class="col-lg-3 col-sm-7 col-7">
                            <div class="cart-box text-right" >
                                <ul>                                             
                                
                                    <li><a href="<?= Url::to(['cart/index']) ?>"><i class="fa fa-shopping-basket"></i><span class="cart-counter"><?= $_SESSION['cart.qty'] ?></span></a>
                                        <ul class="ht-dropdown main-cart-box">
                                            <li id="cartBox">

                                                


                                                
                                               
                                                <!-- Cart Footer Inner Start -->
                                                <div class="cart-footer fix">
                                                    <h5>total :<span class="f-right"><?= $_SESSION['cart.sum'] ?>р.</span></h5>
                                                    <div class="cart-actions">
                                                        <a class="checkout" href="<?= Url::to(['cart/index']) ?>">Checkout</a>
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->



                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Cartt Box End -->
                        <div class="col-sm-12 d-lg-none">
                            <div class="mobile-menu">
                                <nav>
                                    <ul>
                                        <li><a href="<?= Url::home() ?>">Домой</a></li>
                                        <li><a href="<?= Url::toRoute('shop/index') ?>">Товары</a></li>
                                       
                                        
                                        </li>
                                        <li><a href="about.html">О Нас</a></li>
                                        <li><a href="contact.html">Контакты</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!-- Mobile Menu  End -->                        
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End -->
        </header>
        <!-- Header Area End -->
        
        <?= $content ?>
        
        <footer class="off-white-bg">
            <!-- Footer Top Start -->
            <div class="footer-top pt-50 pb-60">
                <div class="container">
                                   
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-lg-4  col-md-7 col-sm-6">
                            <div class="single-footer">
                                <h3>Contact us</h3>
                                <div class="footer-content">
                                    <div class="loc-address">
                                        <span><i class="fa fa-map-marker"></i>184 Main Rd E, St Albans VIC 3021, Australia.</span>
                                        <span><i class="fa fa-envelope-o"></i>Mail Us : yourinfo@example.com</span>
                                        <span><i class="fa fa-phone"></i>Phone: + 00 254 254565 54</span>
                                    </div>
                                    <div class="payment-mth"><a href="#"><img class="img" src="img/footer/1.png" alt="payment-image"></a></div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2  col-md-5 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">Information</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Site Map</a></li>
                                        <li><a href="#">Specials</a></li>
                                        <li><a href="#">Jobs</a></li>
                                        <li><a href="#">Delivery Information</a></li>
                                        <li><a href="#">Order History</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2  col-md-4 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">My Account</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="account.html">My account</a></li>
                                        <li><a href="#">Checkout</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">address</a></li>
                                        <li><a href="#">Order status</a></li>
                                        <li><a href="#">Site Map</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">customer service</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="account.html">My account</a></li>
                                        <li><a href="#">New</a></li>
                                        <li><a href="#">Gift Cards</a></li>
                                        <li><a href="#">Return Policy</a></li>
                                        <li><a href="#">Your Orders</a></li>
                                        <li><a href="#">Subway</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-lg-2 col-md-4 col-sm-6 footer-full">
                            <div class="single-footer">
                                <h3 class="footer-title">Let Us Help You</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="#">Your Account</a></li>
                                        <li><a href="#">Your Orders</a></li>
                                        <li><a href="#">Shipping</a></li>
                                        <li><a href="#">Amazon Prime</a></li>
                                        <li><a href="#">Replacements</a></li>
                                        <li><a href="#">Manage </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Top End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom off-white-bg2">
                <div class="container">
                    <div class="footer-bottom-content">
                        <p class="copy-right-text">Copyright © <a  href="#">Jantrik</a> All Rights Reserved.</p>
                        <div class="footer-social-content">
                            <ul class="social-content-list">                                
                                <!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> -->
                               
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>
        <!-- Footer End -->
    </div>
    
<?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>