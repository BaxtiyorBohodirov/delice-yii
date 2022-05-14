<?php

namespace app\modules\api\models;
use yii\web\Link;
use app\models\Carousel as ModelsProducts;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\Url;
use yii\web\Linkable;

class Carousel extends ModelsProducts
{

   
    public function fields()
    {
        // $fields=parent::fields();
        // unset($fields['content_ru'],$fields['content_en'],$fields['sub_content_en'],
        // $fields['sub_content_ru'],$fields['title_ru'],$fields['title_en']);
        return [
            'id',
            'title'=>'title_uz',
            'image'
        ];
    }
    public function extraFields()
    {
        return ['content_uz',];
    }
}
?>