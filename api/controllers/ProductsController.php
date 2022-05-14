<?php
namespace app\controllers;


use Yii;
use yii\rest\ActiveController;

class ProductsController extends ActiveController
{
  public  $modelClass="http://delice/api/models/Products";
  // public function actions()
  // {
  //   $actions=parent::actions();
  //   unset($actions['index']);
  //   return $actions;
  // }
  // public function actionIndex()
  // {

  //   return Yii::getAlias("@app");
  // }
}

?>