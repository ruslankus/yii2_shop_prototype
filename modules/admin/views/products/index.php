<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' =>  'category_id',
                'value' => function($data)
                {
                    return $data->category->name;
                }
            ],

            'name',
            //'content:ntext',
            'price',
            // 'keywords',
            // 'description',
            // 'img',
            [
                'attribute' =>'hit',
                'value' => function($data)
                {
                    $hit = $data->hit;
                    return !empty($hit)? "<span class='text-danger'>Hit</span>" : '';
                },
                'format' => 'raw'
            ] ,
            [
                'attribute' =>'new',
                'value' => function($data)
                {
                    $new = $data->new;
                    return !empty($new)? "<span class='text-danger'>New</span>" : '';
                },
                'format' => 'raw'
            ] ,

            [
                'attribute' =>'sale',
                'value' => function($data)
                {
                    $sale = $data->sale;
                    return !empty($sale)? "<span class='text-danger'>Sale</span>" : '';
                },
                'format' => 'raw'
            ] ,

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
