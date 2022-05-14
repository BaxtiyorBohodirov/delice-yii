<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Products'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'image',
            'title_uz',
            'title_en',
            'title_ru',
            //'sub_content_uz',
            //'sub_content_ru',
            //'sub_content_en',
            //'content_uz:ntext',
            //'content_ru:ntext',
            //'content_en:ntext',
            //'price',
            //'catalog_id',
            //'status',
            //'order',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
