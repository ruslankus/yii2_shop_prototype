<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\models\Categories;
use yii\helpers\ArrayHelper;
use app\components\MenuWidget;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Categories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categories-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php //$items = ArrayHelper::map(Categories::find()->all(),'id', 'name') ?>
    <?php // echo $form->field($model, 'parent_id')->dropDownList($items);  ?>


    <div class="form-group field-categories-parent_id has-success">
        <label for="categories-parent_id" class="control-label">Parent category</label>
        <select name="Categories[parent_id]" class="form-control" id="categories-parent_id">
            <option value="0">Root category</option>
            <?= MenuWidget::widget(['tpl' => 'select', 'model' => $model])?>


        </select>

        <div class="help-block"></div>
    </div>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
