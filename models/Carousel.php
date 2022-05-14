<?php

namespace app\models;
use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "carousel".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $title_ru
 * @property string|null $content_uz
 * @property string|null $content_ru
 * @property string|null $content_en
 * @property string|null $link
 * @property int|null $status
 * @property int|null $order
 */
class Carousel extends \yii\db\ActiveRecord
{
    const STATUS_UNLISTED=0;
    const STATUS_PUBLISHED=1;

   public  $image1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carousel';
    }
    public static function getStatusLabels()
    {
        return [
            self::STATUS_PUBLISHED=>'published',
            self::STATUS_UNLISTED=>'unlisted'
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['status', 'order'], 'integer'],
            [['image', 'title_uz', 'title_en', 'title_ru', 'link'], 'string', 'max' => 255],
        ];
    }
    public  function save($runvalidation=true,$attributeNames=null)
    {
        $isInsert=$this->isNewRecord;
        $imagePath=Yii::getAlias('@app/web/app/images/'.$this->image1->name);
       if($this->image1)
       {
            $this->image=$this->image1->name;
            $this->link=$this->getImageLink($this->image1->name);
       }
          $saved= parent::save($runvalidation,$attributeNames);
        if(!$saved)
        {
            return false;
        }
        if($isInsert)
        {
            if(!is_dir(dirname($imagePath)))
            {
                FileHelper::createDirectory(dirName($imagePath));
            }
        }
        if(!file_exists($imagePath))
        {
            $this->image1->saveAs($imagePath);
        }
            return true;
    }  
    public static function getImageLink($imgName)
    {
        return Yii::$app->params['imgUrl'].$imgName;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image' => 'Image',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'title_ru' => 'Title Ru',
            'content_uz' => 'Content Uz',
            'content_ru' => 'Content Ru',
            'content_en' => 'Content En',
            'link' => 'Link',
            'status' => 'Status',
            'order' => 'Order',
        ];
    }
   
}
