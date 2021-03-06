<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\assets\PublicAsset;
//$this->title = 'Pharmacy';

//AppAsset::register($this);
PublicAsset::register($this);
$img =  \app\models\Setting::getSetting('logo');
$currency =  \app\models\Setting::getSetting('currency');
$title =  \app\models\Setting::getSetting('title');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="header"><!--header-->
    <div class="header_top"><!--header_top-->
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="contactinfo">
                        <ul class="nav nav-pills navbar-nav">
                            <li><a href="#"><i class="fa fa-phone"></i> <?= \app\models\Setting::getSetting('phones');?></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> <?= \app\models\Setting::getSetting('email');?></a></li>
                            <li class="dropdown"><a href="#"><?= $currency ?><i class="fa fa-angle-down"></i></a>
                                <ul role="menu" class="sub-menu">
                                    <li><a href="#">Долар</a></li>
                                    <li><a href="#">Евро</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6" style=" padding-top: 8px; ">
                    <div class="social-icons pull-right">
                        <ul class="nav navbar-nav">
                            <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="https://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a></li>
                            <li><a href="https://plus.google.com/"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header_top-->

    <div class="header-middle"><!--header-middle-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="logo pull-left">
                        <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><img src="<?= \Yii::$app->imagemanager->getImagePath($img, 150,80) ?>" alt="" /></a>
                    </div>
                    <div class="btn-group">


                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="shop-menu pull-right">
                        <ul class="nav navbar-nav">
                            <?php if(Yii::$app->user->isGuest):?>
                                <li><a href="<?= Url::toRoute(['auth/login'])?>"><i class="fa fa-crosshairs"></i>Авторизация</a></li>
                                <li><a href="<?= Url::toRoute(['auth/signup'])?>"><i class="fa fa-lock"></i>Регистрация</a></li>
                            <?php else: ?>
                                <?= Html::beginForm(['/auth/logout'], 'post')
                                . Html::submitButton(
                                    '<li><i class="fa fa-user"></i> Logout (' . Yii::$app->user->identity->name . ')</li>',
                                    ['class' => 'btn btn-link logout']
                                )
                                . Html::endForm() ?>
                            <?php endif;?>
                            <li><a href="#" onclick="return getCart()"><i class="fa fa-shopping-cart"></i>Корзина</a></li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-middle-->

    <div class="header-bottom"><!--header-bottom-->
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="mainmenu pull-left">
                        <ul class="nav navbar-nav collapse navbar-collapse">
                            <li><a href="<?= \yii\helpers\Url::to(['site/index']) ?>" class="active">Главная</a></li>
                            <li><a href="#contact">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="search_box pull-right">
                        <form method="get" action="<?= Url::to(['category/search'])?>">
                            <input type="text" placeholder="Поиск" name="search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/header-bottom-->
</header><!--/header-->

<?= $content ?>

<footer id="footer"><!--Footer-->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div id="contact" class="companyinfo">
                        <h2><span><?= $title ?></span></h2>
                        <p><i class="fa fa-phone"></i> <?= \app\models\Setting::getSetting('phones');?></p>
                        <p><i class="fa fa-envelope"></i> <?= \app\models\Setting::getSetting('email');?></p>
                    </div>
                </div>
                <div class="col-sm-4 ">
                    <div class="address pull-left">
                        <li><a href=""><?= \app\models\Setting::getSetting('map');?></a></li>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2019 <?= $title ?> Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="<?= \yii\helpers\Url::to(['site/index']) ?>"><?= $title ?></a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

<?php
\yii\bootstrap\Modal::begin([
    'header' => '<h2>Корзина</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
                 <a href="' . Url::to(['cart/view']) . '" class="btn btn-success" >Оформить заказ</a>
                 <button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>'

]); ?>
<?php \yii\bootstrap\Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
