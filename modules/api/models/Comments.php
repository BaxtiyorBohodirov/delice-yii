<?php

namespace app\modules\api\models;
use yii\web\Link;
use app\models\ContactsForm as ModelsProducts;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\Url;
use yii\web\Linkable;

class Comments extends ModelsProducts
{

   
    public function fields()
    {
        // $fields=parent::fields();
        // unset($fields['content_ru'],$fields['content_en'],$fields['sub_content_en'],
        // $fields['sub_content_ru'],$fields['title_ru'],$fields['title_en']);
        return [
            'Id'=>'id',
            'Name'=>'name',
            'Phone'=>'phone',
            'Email'=>'email',
            'Comment'=>'content'
        ];
    }
    public function extraFields()
    {
        return [];
    }
}
?>