<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_catalog".
 *
 * @property int $id
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $title_ru
 * @property int|null $status
 * @property int|null $order
 *
 * @property Products[] $products
 */
class ProductsCatalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'order'], 'integer'],
            [['title_uz', 'title_en', 'title_ru'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_uz' => 'Title Uz',
            'title_en' => 'Title En',
            'title_ru' => 'Title Ru',
            'status' => 'Status',
            'order' => 'Order',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return  $this->hasMany(Products::className(), ['catalog_id' => 'id']);
    }
}
