<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OurMission */

$this->title = Yii::t('app', 'Create Our Mission');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Our Missions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="our-mission-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
