<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\AboutSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Abouts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create About'), ['create'], ['class' => 'btn btn-success']) ?>
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
            'content_uz:ntext',
            //'content_ru:ntext',
            //'content_en:ntext',

            [
                'class' => 'yii\grid\ActionColumn'
            // 'buttons'=>[
            //     'view'=> function($url){
            //         return "";
            //     },
            //     'update'=> function($url){
            //         return "";
            //     },
            //     'delete'=> function($url){
            //         return Html::a('delete', $url, $options = [
            //             'data-method'=>'post',
            //             'data-confirm'=>'Are you sure?'
            //         ]);
            //     }
            // ]
        ],
        ],
    ]); ?>


</div>
