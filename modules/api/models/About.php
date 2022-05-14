<?php

namespace app\modules\api\models;
use yii\web\Link;
use app\models\About as ModelsProducts;
use yii\filters\auth\HttpBasicAuth;
use yii\helpers\Url;
use yii\web\Linkable;

class About extends ModelsProducts
{

   
    // public function getLinks()
    // {
    //     return [
    //         Link::REL_SELF => Url::to(['/site/gallery', 'product_id' => $this->id], true),
    //        'card'=> Url::to(['/site/card', 'product_id' => $this->id], true),
    //     ];
    // }
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