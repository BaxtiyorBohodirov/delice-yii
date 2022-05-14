<?php

namespace app\modules\api\controllers;
use app\modules\api\controllers\MainController;
use yii\rest\ActiveController;

class CommentsController extends MainController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => null,
    ];
    public $modelClass="app\modules\api\models\comments";
}
?>