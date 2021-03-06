<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;

$currency =  \app\models\Setting::getSetting('currency');
?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Категории</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Бренды</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <?php foreach ($brands as $brand): ?>
                                    <li><a href="<?= \yii\helpers\Url::to(['brand/view',  'id' => $brand['id']]) ?>"> <span class="pull-right">(<?= $brand->getProductsCount()?>)</span><?= $brand->title ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <?php if(!empty($products)): ?>
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Поиск по запросу: <?= Html::encode($q) ?></h2>
                    <?php $i = 0; foreach ($products as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <a href="<?= \yii\helpers\Url::to(['product/view',  'id' => $product->id]) ?>">
                                            <img src="<?= \Yii::$app->imagemanager->getImagePath($product->image, 200,200) ?>" alt="" />

                                            <h2><?= $product->price ?><?= $currency ?></h2>
                                            <p><?= $product->name?></p></a>
                                        <a href="<?= yii\helpers\Url::to(['cart/add', 'id' => $product->id ]) ?>" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <?php $i++ ?>
                        <?php if ($i % 3 ==0):?>
                            <div class="clearfix"></div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                    <?php
                    echo LinkPager::widget(['pagination' => $pages]);
                    ?>
                    <?php else: ?>
                        <h3>Ничего не найдено: </h3>
                    <?php endif; ?>

                </div><!--features_items-->
            </div>
        </div>
    </div>
</section>