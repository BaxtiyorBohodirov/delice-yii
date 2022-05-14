<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContactsForm */

$this->title = Yii::t('app', 'Create Contacts Form');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Contacts Forms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacts-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
