<?php
$currency =  \app\models\Setting::getSetting('currency');

?>

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
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">
                        <div class="view-product">
                            <img src="<?= \Yii::$app->imagemanager->getImagePath($product->image, 300,300, 'center:center') ?>" alt="" />
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="" alt=""></a>
                                    <a href=""><img src="" alt=""></a>
                                    <a href=""><img src="" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="" alt=""></a>
                                    <a href=""><img src="" alt=""></a>
                                    <a href=""><img src="" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="" alt=""></a>
                                    <a href=""><img src="" alt=""></a>
                                    <a href=""><img src="" alt=""></a>
                                </div>

                            </div>

                            <!-- Controls -->
                            <a class="left item-control" href="#similar-product" data-slide="prev">
                                <i class="fa fa-angle-left"></i>
                            </a>
                            <a class="right item-control" href="#similar-product" data-slide="next">
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>

                    </div>
                    <div class="col-sm-7">
                        <div class="product-information"><!--/product-information-->
                            <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                            <h2><?= $product->name?></h2>
                            <p><?= $product->article ?></p>
                            <img src="images/product-details/rating.png" alt="" />
                            <span>
									<span><?= $product->price ?><?= $currency ?></span>
									<label>Quantity:</label>
									<input type="text" value="1" id="qty" />
									<a href="<?= yii\helpers\Url::to(['cart/add', 'id' => $product->id ]) ?>" data-id="<?= $product->id ?>" class="btn btn-fefault cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
								</span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b> <a href="<?= \yii\helpers\Url::to(['brand/view',  'id' => $product->brand->id]) ?>"><?= $product->brand->name ?></a></p>
                            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->

                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li><a href="#details" data-toggle="tab">Details</a></li>
                            <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="details" >
                            <div><?= $product->content?></div>

                        </div>

                        <div class="tab-pane fade active in" id="reviews" >
                            <div class="col-sm-12">
                                <p><b>Написать коментарий</b></p>

                                <form action="#">
                                    <textarea name="" ></textarea>
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--/category-tab-->

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
                                                <img src="<?= \Yii::$app->imagemanager->getImagePath($populars->image, 300,300, 'center:center') ?>" alt="" />
                                                <h2><?= $product->price ?><?= $currency ?></h2>
                                                <p><?= $populars->name ?></p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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