<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-images-form">

    <?php $form = ActiveForm::begin( ['options'=>['enctype'=>'multipart/form-data']]); ?>
    <div class="form-group">
            <label><?= $model->attributeLabels()['image'] ?></label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image" name="image" >
                <label  id="labelForImage" class="custom-file-label" for="image">
                    Choose file
                </label>
            </div>
    </div>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'forPage')->dropDownList([0=>'For product',1=>'For Card']) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
