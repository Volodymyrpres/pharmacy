<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
    <div class="container text-center">
        <div class="logo-404">
            <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><img src="/public/images/home/logo.png" alt="" /></a>
        </div>
        <div class="content-404">
            <img src="/public/images/404/404.png" class="img-responsive" alt="" />
            <h1><b><?= nl2br(Html::encode($message)) ?></b></h1>
            <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
            <h2><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Bring me back Home</a></h2>
        </div>
    </div>


