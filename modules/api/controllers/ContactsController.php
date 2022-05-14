<?php
namespace app\modules\api\controllers;
use yii\rest\ActiveController;

class ContactsController extends MainController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => null,
    ];
    public $modelClass="app\modules\api\models\Contacts";
    

} 
?>