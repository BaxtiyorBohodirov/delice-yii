<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;
use yii\web\Linkable;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $title_ru
 * @property string|null $sub_content_uz
 * @property string|null $sub_content_ru
 * @property string|null $sub_content_en
 * @property string|null $content_uz
 * @property string|null $content_ru
 * @property string|null $content_en
 * @property int|null $price
 * @property int|null $catalog_id
 * @property int|null $status
 * @property int|null $order
 * @property int|null $onGallery
 *
 * @property ProductsCatalog $catalog
 * @property ProductDetails[] $productDetails
 * @property ProductImages[] $productImages
 */
class Products extends \yii\db\ActiveRecord
{
    const ONGALLERY_UNLISTED=0;
    const ONGALLERY_PUBLISHED=1;

    public $image1;
    /**
     * {@inheritdoc}
     */
    
    
     public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_uz', 'content_ru', 'content_en'], 'string'],
            [['price', 'catalog_id', 'status', 'order','ponGallery'], 'integer'],
            [['image', 'title_uz', 'title_en', 'title_ru', 'sub_content_uz', 'sub_content_ru', 'sub_content_en'], 'string', 'max' => 255],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductsCatalog::className(), 'targetAttribute' => ['catalog_id' => 'id']],
        ];
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
            'sub_content_uz' => 'Sub Content Uz',
            'sub_content_ru' => 'Sub Content Ru',
            'sub_content_en' => 'Sub Content En',
            'content_uz' => 'Content Uz',
            'content_ru' => 'Content Ru',
            'content_en' => 'Content En',
            'price' => 'Price',
            'catalog_id' => 'Catalog ID',
            'status' => 'Status',
            'order' => 'Order',
            'ponGallery' => 'On Gallery',

        ];
    }
  
    public static function getOnGalleryLabels()
    {
        return [
            self::ONGALLERY_UNLISTED=>'unlisted',                      
            self::ONGALLERY_PUBLISHED=>'published',
        ];
    } 
    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(ProductsCatalog::className(), ['id' => 'catalog_id']);
    }

    /**
     * Gets query for [[ProductDetails]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductDetails()
    {
        return $this->hasMany(ProductDetails::className(), ['product_id' => 'id']);
    }
    public function save($runvalidation=true,$attributeNames=null)
    {
        $isInsert=$this->isNewRecord;
        $imagePath=Yii::getAlias('@app/web/app/images/'.$this->image1->name);
        if($this->image1)
        {
            $this->image=$this->image1->name;
        }
        $saved=parent::save($runvalidation,$attributeNames);
        if(!$saved)
        {
            return false;
        }
        if($isInsert)
        {
            if(!is_dir(dirname($imagePath)))
            {
                FileHelper::createDirectory($imagePath);
            }
        }
        if(!file_exists($imagePath))
        {
            $this->image1->saveAs($imagePath);
        }
        return true;
    }
    /**
     * Gets query for [[ProductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(ProductImages::className(), ['product_id' => 'id']);
    }
}
