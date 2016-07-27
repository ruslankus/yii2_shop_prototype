<?php
    use yii\helpers\Url;

?>
<table class="table table-condensed">

    <thead>
    <tr class="cart_menu">

        <td class="description"></td>
        <td class="price">Price</td>
        <td class="quantity">Quantity</td>
        <td class="total">Total</td>

    </tr>
    </thead>

    <tbody>
    <?php $i =1; foreach ($session['cart'] as $id => $item):?>
        <tr>

            <td class="cart_description">
                <h4>
                    <a href="<?= Url::to(['product/view', 'id' => $id]) ?>">
                        <?= $item['name'] ?>
                    </a>
                </h4>

            </td>
            <td class="cart_price">
                <p><?= $item['price'] ?></p>
            </td>
            <td class="cart_quantity">
                <div class="cart_quantity_button">

                    <span class="cart_quantity_input" ><?= $item['qty']?></span>

                </div>
            </td>
            <td class="cart_total">
                <p class="cart_total_price"><?= $item['price'] * $item['qty'] ?></p>
            </td>

        </tr>
        <?php $i++; endforeach; ?>

    <tr>
        <td colspan="2">&nbsp;</td>
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


    </tbody>
</table>
