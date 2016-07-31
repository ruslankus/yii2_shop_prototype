<?php
use app\components\MenuWidget;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\helpers\Url;




?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>

                    <ul class="catalog category-products">
                        <?= MenuWidget::widget();?>
                    </ul>

                    <div class="brands_products"><!--brands_products-->
                        <h2>Brands</h2>
                        <div class="brands-name">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href=""> <span class="pull-right">(50)</span>Acne</a></li>
                                <li><a href=""> <span class="pull-right">(56)</span>Grüne Erde</a></li>
                                <li><a href=""> <span class="pull-right">(27)</span>Albiro</a></li>
                                <li><a href=""> <span class="pull-right">(32)</span>Ronhill</a></li>
                                <li><a href=""> <span class="pull-right">(5)</span>Oddmolly</a></li>
                                <li><a href=""> <span class="pull-right">(9)</span>Boudestijn</a></li>
                                <li><a href=""> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
                            </ul>
                        </div>
                    </div><!--/brands_products-->

                    <div class="price-range"><!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b>$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div><!--/price-range-->

                    <div class="shipping text-center"><!--shipping-->
                        <img src="/images/home/shipping.jpg" alt="" />
                    </div><!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-5">

                        <div class="view-product">



                            <?= Html::img("@web/images/products/{$product->img}",['alt' => $product->name])?>
                            <h3>ZOOM</h3>
                        </div>
                        <div id="similar-product" class="carousel slide" data-ride="carousel">

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
                                </div>
                                <div class="item">
                                    <a href=""><img src="/images/product-details/similar1.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar2.jpg" alt=""></a>
                                    <a href=""><img src="/images/product-details/similar3.jpg" alt=""></a>
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

                            <?php if(true == $product->sale):?>
                                <?= Html::img('@web/images/home/sale.png', ['alt'=> 'Sale', "class"=>'newarrival']); ?>
                            <?php endif;?>

                            <?php if(true == $product->new):?>
                                <?= Html::img('@web/images/product-details/new.jpg', ['alt'=> 'New', "class"=>'newarrival']); ?>
                            <?php endif;?>


                            <h2><?= $product->name; ?></h2>
                            <p>Web ID: 1089772</p>
                            <img src="/images/product-details/rating.png" alt="" />
                            <span>
									<span><?= $product->price?></span>
									<label>Quantity:</label>
									<input id="qty" type="text" value="1" />
									<a href="<?= Url::to(['cart/add', 'id'=> $product->id ])?>"
                                       class="btn btn-fefault cart add-to-cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</a>
								</span>
                            <p><b>Availability:</b> In Stock</p>
                            <p><b>Condition:</b> New</p>
                            <p><b>Brand:</b>
                                <a href="<?= Url::to(['category/view','id' => $product->category->id])?>">
                                    <?= $product->category->name ?>
                                </a>
                            </p>
                            <a href=""><img src="/images/product-details/share.png" class="share img-responsive"  alt="" /></a>
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->


                <div class="category-tab shop-details-tab"><!--category-tab-->
                    <div class="col-sm-12">
                        <div class="" id="reviews" >
                            <?= $product->content ?>
                        </div>
                    </div>

                </div>


                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">recommended items</h2>

                    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">

                        <?php $i=0; foreach($hits_chunk as $hits ):
                            $class = (0 == $i)? 'item active' : 'item';
                        ?>
                            <div class="<?= $class?>">
                            <?php foreach ($hits as $hit):?>
                                <div class="col-sm-4">
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">

                                                <?= Html::img("@web/images/products/{$hit->img}", ['alt' => $hit->name])?>
                                                <h2><?= $hit->price?></h2>
                                                <p>
                                                    <a href="<?= Url::to(['product/view', 'id' => $hit->id])?>">
                                                        <?= $hit->name?>
                                                    </a>
                                                </p>
                                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php endforeach;?>
                            </div><!--/item -->
                        <?php $i++; endforeach; ?>



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