<?php
namespace app\modules\api\controllers;
use yii\filters\Cors;
use yii\rest\ActiveController;
use yii\web\Response;

class MainController extends ActiveController
{
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
    public function behaviors()
    {
        $behaviors=parent::behaviors();
        // $behaviors['authenticator']=['class'=>HttpBasicAuth::className()];
        $behaviors['corsFilter']=[
            'class' => \yii\filters\Cors::class,
            'cors' => [
                // restrict access to
                'Origin' => ['http://newproject'],
                // Allow only POST and PUT methods
                // 'Access-Control-Request-Method' => ['GET','HEAD', 'PUT'],
                // Allow only headers 'X-Wsse'
                'Access-Control-Request-Headers' => ['*'],
                // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                'Access-Control-Allow-Credentials' => true,
                // Allow OPTIONS caching
                'Access-Control-Max-Age' => 3600,
                // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                'Access-Control-Expose-Headers' => ['*'],
            ]
            ];
            $behaviors['formats']=[
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ];
        return $behaviors;
    }
}
?>