<?php

namespace app\modules\api\models;
use yii\web\Link;
use app\models\Contacts as ModelsProducts;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\Url;
use yii\web\Linkable;

class Contacts extends ModelsProducts
{

   
  
    public function fields()
    {
        // $fields=parent::fields();
        // unset($fields['content_ru'],$fields['content_en'],$fields['sub_content_en'],
        // $fields['sub_content_ru'],$fields['title_ru'],$fields['title_en']);
        return [
            'Id'=>'id',
            'Adress'=>'adress_uz',
            'Phone number'=>'phone',
            'Email'=>'email'
        ];
    }
    public function extraFields()
    {
        return [
            'Facebook'=>'facebook',
            'Telegram'=>'telegram',
            'Instagram'=>'instagram'
        ];
    }
}
?>