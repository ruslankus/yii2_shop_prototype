<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view col-md-12">

    <h1> Order - <?= $model->id ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => !$model->status ? "<span class='text-danger'>Active</span>" :
                    "<span class='text-success'>Closed</span>",

                'format' => 'raw'
            ],
            'name',
            'email:email',
            'phone',
            'address',
        ],
    ]) ?>


    <h3>Iems list</h3>

    <?php $items = $model->orderItems; ?>
    <?php if(!empty($items)):?>

    <table class="table table-bordered">


        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>qty</th>
                <th>price</th>
                <th>sum</th>

            </tr>

        </thead>

        <tbody>
        <?php $i = 1; foreach ($items as $item):?>
            <tr>
                <td><?= $i ?></td>
                <td>
                    <a href="<?= Url::to(["/product/view", 'id' => $item->product_id ])?>">
                        <?= $item->name?>
                    </a>
                </td>
                <td><?= $item->qty_item ?></td>
                <td><?= $item->price ?></td>
                <td><?= $item->sum_item ?></td>

            </tr>
        <?php $i++; endforeach; ?>
        </tbody>

    </table>

    <?php endif; ?>

</div>
