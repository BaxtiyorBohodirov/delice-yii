<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OurMission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="our-mission-form">

    <?php $form = ActiveForm::begin( 
    ['options'=>['enctype'=>'multipart/form-data']]); ?>

    <div class="form-group">
            <label>Image left</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image-left" name="image-left" >
                <label  id="labelForImageLeft" class="custom-file-label" for="image-left">
                    Choose file
                
                </label>
            </div>
    </div>
    <div class="form-group">
            <label>Image right</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image-right" name="image-right" >
                <label  id="labelForImageRigth" class="custom-file-label" for="image-right">
                    Choose file
                </label>
            </div>
    </div>
    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
