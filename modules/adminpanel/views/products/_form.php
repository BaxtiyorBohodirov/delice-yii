<?php

use app\models\Carousel;
use app\models\ProductsCatalog;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(
    ['options'=>['enctype'=>'multipart/form-data']]); ?>
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

    <?= $form->field($model, 'title_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_content_uz')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_content_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_content_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content_uz')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_ru')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'catalog_id')->dropDownList(ArrayHelper::map(ProductsCatalog::find()->asArray()->all(),'id','title_uz')); ?>

    <?= $form->field($model, 'status')->dropDownList(Carousel::getStatusLabels()) ?>

    <?= $form->field($model, 'order')->textInput() ?>
    
    <?= $form->field($model, 'ponGallery')->dropDownList($model->getOnGalleryLabels()) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>