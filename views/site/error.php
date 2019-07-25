<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;


$img =  \app\models\Setting::getSetting('logo');
$this->title = $name;
?>
    <div class="container text-center">
        <div class="logo-404">
            <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><img src="<?= \Yii::$app->imagemanager->getImagePath($img, 150,80) ?>" alt="" /></a>
        </div>
        <div class="content-404">
            <img src="/public/images/404/404.png" class="img-responsive" alt="" />
            <h1><b><?= nl2br(Html::encode($message)) ?></b></h1>
            <p>Упс! Что то пошло не так.</p>
            <h2><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">На главную</a></h2>
        </div>
    </div>


