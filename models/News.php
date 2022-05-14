<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "news".
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
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 * @property int|null $order
 */
class News extends \yii\db\ActiveRecord
{
    public $image1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_content_uz', 'sub_content_ru', 'sub_content_en', 'content_uz', 'content_ru', 'content_en'], 'string'],
            [['created_at', 'updated_at', 'status', 'order'], 'integer'],
            [['image', 'title_uz', 'title_en', 'title_ru'], 'string', 'max' => 255],
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
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'order' => 'Order',
        ];
    }
    public function save($runvalidation=true,$attributeNames=null)
    {
        $isInsert=$this->isNewRecord;
        $imagePath="@app/web/app/images/".$this->image1->name;
        if($this->image1)
        {
            $this->image=$this->image1->name;
        }
        if($isInsert)
        {
            $this->created_at=time();
        }
        else{
            $this->updated_at=time();
        }
        $saved=parent::save($runvalidation=true,$attributeNames=null);
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
}
