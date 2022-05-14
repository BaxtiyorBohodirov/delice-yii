<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "product_images".
 *
 * @property int $id
 * @property string|null $image
 * @property int|null $product_id
 * @property int|null $forPage
 * @property Products $product
 */
class ProductImages extends \yii\db\ActiveRecord
{
    public $image1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id','forPage'], 'integer'],
            [['image'], 'string', 'max' => 255],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
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
            'product_id' => 'Product ID',
            'forPage'=>'For Page'
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
    public function save($runvalidation=true,$attributeNames=null)
    {
        $isInsert=$this->isNewRecord;
        $imagePath=Yii::getAlias("@app/web/app/images/".$this->image1->name);
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
                FileHelper::createDirectory(dirname($imagePath));
            }
        }
        if(!file_exists($imagePath))
        {
            $this->image1->saveAs($imagePath);
        }
        return true;
    }
}
