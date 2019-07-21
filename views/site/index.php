<?php
$currency =  \app\models\Setting::getSetting('currency');
?>


<section id="slider"><!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <?php $count = count($slider); $i = 0; foreach($slider as $sliders): ?>
                        <?php if($i % 1 == 0): ?>
                        <div class="item <?php if($i == 0) echo 'active' ?>">
                        <?php endif ?>
                            <div class="col-sm-6">
                                <h1><span>P</span>harmacy</h1>
                                <h2><?= $sliders->name?></h2>
                                <h2><?= $sliders->price?><?= $currency ?></h2>
                                <a href="<?=\yii\helpers\Url::to(['cart/add',  'id' => $sliders->id]) ?>" data-id="<?= $sliders->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="<?= \yii\helpers\Url::to(['product/view',  'id' => $product->id]) ?>">
                                    <img src="<?= \Yii::$app->imagemanager->getImagePath($sliders->image, 300,300, 'center:center') ?>" class="girl img-responsive" alt="" /></a>
                            </div>
                            <?php $i++; if($i % 1 == 0 || $i == $count): ?>
                        </div>
                        <?php endif ?>
                        <?php endforeach; ?>
                    </div>

                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section><!--/slider-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <ul class="catalog category-products">
                    <?= \app\components\MenuWidget::widget(['tpl' => 'menu'])?>
                    </ul>
                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
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
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Features Items</h2>
                    <?php foreach ($popular as $product): ?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?= \yii\helpers\Url::to(['product/view',  'id' => $product->id]) ?>">
                                    <img src="<?= \Yii::$app->imagemanager->getImagePath($product->image, 250,250) ?>" alt="" />

                                    <h2><?= $product->price?><?= $currency ?></h2>
                                    <p><?= $product->name?></p></a>
                                    <a href="<?=\yii\helpers\Url::to(['cart/add',  'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>

                                </div>


                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>

                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <?php $count = count($popular); $i = 0; foreach($popular as $populars): ?>
                            <?php if($i % 3 == 0): ?>
                            <div class="item <?php if($i == 0) echo 'active' ?>">
                                <?php endif ?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <a href="<?= \yii\helpers\Url::to(['product/view',  'id' => $product->id]) ?>">
                                                    <img src="<?= \Yii::$app->imagemanager->getImagePath($populars->image, 300,300, 'center:center') ?>"></a>
                                                <h2>$<?= $product->price ?><?= $currency ?></h2>
                                                <p><?= $populars->name ?></p>
                                                <a href="<?= yii\helpers\Url::to(['cart/add', 'id' => $populars->id ]) ?>" data-id="<?= $populars->id ?>" class="btn btn-fefault cart add-to-cart">
                                                    <i class="fa fa-shopping-cart"></i>
                                                    Add to cart
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <?php $i++; if($i % 3 == 0 || $i == $count): ?>
                            </div>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </div>
                        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div><!--/recommended_items-->

            </div>
        </div>
    </div>
</section>
