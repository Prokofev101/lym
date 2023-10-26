<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="animsition">
<?php $this->beginBody() ?>
<?php
$URL = $_SERVER['REQUEST_URI'];
$link = explode('/', $URL);
$link = end($link);

$menu = [
    ['Главная', 'home'],
    ['Каталог', 'shop'],
    ['О нас', 'about'],
    ['Контакты', 'contact'],
];
//$relativeHomeUrl = \yii\helpers\Url::base();
//echo $relativeHomeUrl;
$request = Yii::$app->request;
//echo $request->hostInfo;
?>
<!-- Header -->
<header>
    <!-- Header desktop -->
    <div class="container-menu-desktop">
        <!-- Topbar -->
        <div class="top-bar">
            <div class="content-topbar flex-sb-m h-full container">
                <div class="left-top-bar">
<!--                    Какая-то акция-->
                </div>

                <div class="right-top-bar flex-w h-full">
                    <a href="https://t.me/kimwork111" class="flex-c-m trans-04 p-lr-25">
                        <i><?= Html::img('@web/images/icons/telegram.svg')?></i>
                    </a>
<!--                    <a href="#" class="flex-c-m trans-04 p-lr-25">-->
<!--                        <i>--><?php //= Html::img('@web/images/icons/instagram.svg')?><!--</i>-->
<!--                    </a>-->
                </div>
            </div>
        </div>

        <div class="wrap-menu-desktop">
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="<?= \yii\helpers\Url::home()?>" class="logo">
                    <h1 style="color: #666666">LYM</h1>
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu">
                        <?php foreach ($menu as $chosen) {?>
                            <li <?php if ($link == $chosen[1]) { ?> class="active-menu"<?php } ?> >
<!--                                <a href="--><?php //= $chosen[1];?><!--">--><?php //=$chosen[0];?><!--</a>-->
                                <a href="<?= $request->hostInfo . '/lymshop/' . $chosen[1]?>"><?= $chosen[0]?></a>
                            </li>
                        <?php }?>
                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                        <i class="zmdi zmdi-search"></i>
                    </div>

                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                        <a style="color: #333" href="<?= \yii\helpers\Url::toRoute('cart/')?>"><i class="zmdi zmdi-shopping-cart"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <a href="<?= \yii\helpers\Url::home()?>" class="logo-mobile">
            <h1 style="color: #666666">LYM</h1>
        </a>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                <i class="zmdi zmdi-search"></i>
            </div>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
                <a style="color: #333" href="<?= \yii\helpers\Url::toRoute('cart/')?>"><i class="zmdi zmdi-shopping-cart"></i></a>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">
        <ul class="topbar-mobile">
<!--            <li>-->
<!--                <div class="left-top-bar">-->
<!--                    Free shipping for standard order over $100-->
<!--                </div>-->
<!--            </li>-->

            <li>
                <div class="right-top-bar flex-w h-full">
                    <a href="https://t.me/kimwork111" class="flex-c-m trans-04 p-lr-25">
                        <i><?= Html::img('@web/images/icons/telegram.svg')?></i>
                    </a>
                    <a href="#" class="flex-c-m trans-04 p-lr-25">
                        <i><?= Html::img('@web/images/icons/instagram.svg')?></i>
                    </a>
                </div>
            </li>
        </ul>
            <ul class="main-menu-m">
                <?php foreach ($menu as $chosen) {?>
                    <li <?php if ($link == $chosen[1]) { ?> class="active-menu"<?php } ?> >
                        <a href="<?= $request->hostInfo . '/lymshop/' . $chosen[1]?>"><?= $chosen[0]?></a>
                    </li>
                <?php }?>
            </ul>
        </div>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
<!--                <img src="images/icons/icon-close2.png" alt="CLOSE">-->
                <?= Html::img('@web/images/icons/icon-close2.png', ['alt' => 'CLOSE'])?>
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>


<?= $content ?>

<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
    <div class="s-full js-hide-cart"></div>

    <div class="header-cart flex-col-l p-l-65 p-r-25">
        <div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

            <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                <i class="zmdi zmdi-close"></i>
            </div>
        </div>

        <div class="header-cart-content flex-w js-pscroll">
            <ul class="header-cart-wrapitem w-full">
                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
<!--                        <img src="images/item-cart-01.jpg" alt="IMG">-->
                        <?= Html::img('@web/images/item-cart-01.jpg', ['alt' => 'IMG'])?>

                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            White Shirt Pleat
                        </a>

                        <span class="header-cart-item-info">
								1 x $19.00
							</span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
<!--                        <img src="images/item-cart-02.jpg" alt="IMG">-->
                        <?= Html::img('@web/images/item-cart-02.jpg', ['alt' => 'IMG'])?>
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Converse All Star
                        </a>

                        <span class="header-cart-item-info">
								1 x $39.00
							</span>
                    </div>
                </li>

                <li class="header-cart-item flex-w flex-t m-b-12">
                    <div class="header-cart-item-img">
<!--                        <img src="images/item-cart-03.jpg" alt="IMG">-->
                        <?= Html::img('@web/images/item-cart-03.jpg', ['alt' => 'IMG'])?>
                    </div>

                    <div class="header-cart-item-txt p-t-8">
                        <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                            Nixon Porter Leather
                        </a>

                        <span class="header-cart-item-info">
								1 x $17.00
							</span>
                    </div>
                </li>
            </ul>

            <div class="w-full">
                <div class="header-cart-total w-full p-tb-40">
                    Total: $75.00
                </div>

                <div class="header-cart-buttons flex-w w-full">
                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                        View Cart
                    </a>

                    <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal1 -->
<?php //= $this->render('layouts/inc/modal_card')?>

<!-- Footer -->
<footer class="bg3 p-t-75 p-b-32 ">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    LYM
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="<?= \yii\helpers\Url::home()?>" class="stext-107 cl7 hov-cl1 trans-04">
                            На главную
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= \yii\helpers\Url::toRoute('shop/')?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Каталог
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= \yii\helpers\Url::toRoute('about/')?>" class="stext-107 cl7 hov-cl1 trans-04">
                            О нас
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= \yii\helpers\Url::toRoute('contact/')?>" class="stext-107 cl7 hov-cl1 trans-04">
                            Контакты
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Помощь
                </h4>

                <ul>
                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Отследить заказ
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Обмен и возврат
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="#" class="stext-107 cl7 hov-cl1 trans-04">
                            Доставка
                        </a>
                    </li>

                    <li class="p-b-10">
                        <a href="<?= \yii\helpers\Url::toRoute('faq/')?>" class="stext-107 cl7 hov-cl1 trans-04">
                            FAQs
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Обратная связь
                </h4>

                <p class="stext-107 cl7 size-201">
                    Остались вопросы или есть предложение? Напишите нам!
                </p>

                <div class="p-t-27">
                    <a href="https://t.me/kimwork111" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i><?= Html::img('@web/images/icons/footer-telegram.svg')?></i>
                    </a>

                    <a href="mailto:loveyourmind84@gmail.com" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
                        <i><?= Html::img('@web/images/icons/email.svg')?></i>
                    </a>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3 p-b-50">
                <h4 class="stext-301 cl0 p-b-30">
                    Подписаться на рассылку
                </h4>

                <form>
                    <div class="wrap-input1 w-full p-b-4">
                        <input class="input1 bg-none plh1 stext-107 cl7" type="text" name="email" placeholder="email@example.com">
                        <div class="focus-input1 trans-04"></div>
                    </div>

                    <div class="p-t-18">
                        <button class="flex-c-m stext-101 cl0 size-103 bg1 bor1 hov-btn2 p-lr-15 trans-04">
                            Подписаться
                        </button>
                    </div>
                </form>
            </div>
        </div>

            <p class="stext-107 cl6 txt-center">
                ОГРНИП: 323344300002872<br>
                ИНН: 341302637761<br>
                ИП КИМ ВИТАЛИЙ ВЯЧЕСЛАВОВИЧ
            </p>
        </div>
    </div>
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>