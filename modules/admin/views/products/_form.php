<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Categories;
use app\components\MenuWidget;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php //$items = ArrayHelper::map(Categories::find()->all(),'id', 'name') ?>
    <?php // echo $form->field($model, 'parent_id')->dropDownList($items);  ?>

    <div class="form-group field-products_category_id has-success">
        <label for="products-category_id_id" class="control-label">Product category</label>
        <select name="Products[category_id]" class="form-control" id="products-category_id">
            <?= MenuWidget::widget(['tpl' => 'select_product', 'model' => $model]) ?>
        </select>

    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [

        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'preset' => 'standard',
        ]),

    ]);
     ?>

    <?php  // echo $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'hit')->checkbox(['0','1']) ?>

    <?= $form->field($model, 'new')->checkbox(['0','1']) ?>

    <?= $form->field($model, 'sale')->checkbox(['0','1']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
