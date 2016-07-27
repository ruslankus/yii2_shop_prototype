<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use yii\helpers\Url;

?>
<section id="cart_items">
    <div class="container">

        <?php if(Yii::$app->session->hasFlash('success')):?>

            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= Yii::$app->session->getFlash('success'); ?>
            </div>

        <?php endif; ?>

        <?php if(Yii::$app->session->hasFlash('error')):?>

            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?= Yii::$app->session->getFlash('error'); ?>
            </div>

        <?php endif; ?>



        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <?php if(!empty($session['cart'])):?>
                <thead>
                <tr class="cart_menu">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
                    <td class="quantity">Quantity</td>
                    <td class="total">Total</td>
                    <td></td>
                </tr>
                </thead>

                <tbody>
                <?php $i =1; foreach ($session['cart'] as $id => $item):?>
                    <tr>
                    <td class="cart_product">
                        <a href=""><?= Html::img("@web/images/products/{$item['img']}", ['height' => 80])?></a>
                    </td>
                    <td class="cart_description">
                        <h4>
                            <a href="<?= Url::to(['product/view', 'id' => $id]) ?>">
                                <?= $item['name'] ?>
                            </a>
                        </h4>
                        <p>Web ID: 1089772</p>
                    </td>
                    <td class="cart_price">
                        <p><?= $item['price'] ?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">

                            <input class="cart_quantity_input" type="text" name="quantity" value="<?= $item['qty']?>"  size="2">

                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price"><?= $item['price'] * $item['qty'] ?></p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <?php $i++; endforeach; ?>

                <tr>
                    <td colspan="4">&nbsp;</td>
                    <td colspan="2">
                        <table class="table table-condensed total-result">
                            <tr>
                                <td>Total Items</td>
                                <td><?= $session['cart.qty']?></td>
                            </tr>

                            <tr>
                                <td>Total summ</td>
                                <td><span><?= $session['cart.sum']?></span></td>
                            </tr>

                        </table>
                    </td>
                </tr>





                <?php else:?>
                    <tr>
                        <td class="text-center">
                            <h3>Cart is empty</h3>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

            <?php if(!empty($session['cart'])):?>

                <div class="shopper-informations">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="shopper-info">
                                <p>Shopper Information</p>
                                <?php $form = ActiveForm::begin()?>

                                    <?= $form->field($order,'name')->textInput(['placeholder' => 'Name']); ?>

                                    <?= $form->field($order,'email')->input('email', ['placeholder' => 'Email']) ?>

                                    <?= $form->field($order,'phone')->input('phone', ['placeholder' => 'Phone']) ?>

                                    <?= $form->field($order,'address')->input('text', ['placeholder' => 'Adress']) ?>

                                    <?= Html::submitButton('Oontinue',['class' => 'btn btn-primary'])?>

                                <?php ActiveForm::end(); ?>


                            </div>
                        </div>




                    </div>
                </div>


            <?php endif;?>

        </div>
    </div>
</section>