<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            [
                'attribute' =>  'category_id',
                'value' => $model->category->name
            ],
            'name',
            'content:html',
            'price',
            'keywords',
            'description',
            'img',
            [
                'attribute' =>'hit',
                'value' => !empty($model->hit)? "<span class='text-danger'>Hit</span>" : '',

                'format' => 'raw'
            ] ,

            [
                'attribute' =>'new',
                'value' => !empty($model->new)? "<span class='text-danger'>New</span>" : '',
                'format' => 'raw'
            ] ,


            [
                'attribute' =>'sale',
                'value' =>!empty($model->sale)? "<span class='text-danger'>Sale</span>" : '',

                'format' => 'raw'
            ] ,


        ],
    ]) ?>

</div>
