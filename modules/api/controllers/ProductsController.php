<?php

namespace app\modules\api\controllers;

// use MainController;

use app\modules\api\controllers\MainController;
use app\modules\api\models\Products;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class ProductsController extends MainController {
    // public $serializer = [
    //     'class' => 'yii\rest\Serializer',
    //     'collectionEnvelope' => null,
    // ];
    public $modelClass="app\modules\api\models\Products";
    // public function actions()
    // {
    //     $actions=parent::actions();
    //     unset($actions['index']);
    //     return $actions;
    // }
    // public function actionIndex()
    // {
    //     $dataProvider=new ActiveDataProvider(
    //         [
    //             'query'=>Products::find(),
    //             'pagination'=>[
    //                 'pageSize'=>5
    //             ]
    //         ]
    //     );
    //     return $dataProvider;
    // }

}


?>