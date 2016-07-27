<?php
    use yii\helpers\Url;
    use yii\helpers\Html;
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Cart</h4>
</div>
<div class="modal-body">

    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <?php if(!empty($session['cart'])):?>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>qnt</th>
                    <th>price</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php $i =1; foreach ($session['cart'] as $id => $item):?>
                <tr>
                    <td><?= $i?></td>
                    <td>
                        <?= Html::img("@web/images/products/{$item['img']}", ['height' => 50]) ?>
                    </td>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= $item['price'] ?></td>
                    <td>
                        <a href="<?= Url::to(['cart/rem-item', 'id' => $id])?>" class="delete-item">
                            <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                        </a>
                    </td>
                </tr>
                <?php $i++; endforeach; ?>

                <tr>
                    <td colspan="3"></td>
                    <td>Total items</td>
                    <td><?= $session['cart.qty']?></td>
                    <td></td>
                </tr>

                <tr>
                    <td colspan="3"></td>
                    <td>Total sum</td>
                    <td><?= $session['cart.sum']?> EUR</td>
                    <td></td>
                </tr>
            </tbody>

            <?php else:?>
                <tr>
                    <td>Cart is empty</td>
                </tr>
            <?php  endif; ?>
        </table>
    </div>

</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Continue shopping</button>
    <?php if(!empty($session['cart'])):?>
        <a href="<?= Url::to(['cart/view'])?>" class="btn btn-success">
            Make order
        </a>
        <a href="<?= Url::to(['cart/clear']); ?>" class="btn btn-danger clear-cart">Clear cart</a>
    <?php endif; ?>
</div>