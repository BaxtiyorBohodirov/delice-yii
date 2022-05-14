<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "our_mission".
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $title_uz
 * @property string|null $title_en
 * @property string|null $title_ru
 * @property string|null $content_uz
 * @property string|null $content_ru
 * @property string|null $content_en
 */
class OurMission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $image_left;
    public $image_right;
     public static function tableName()
    {
        return 'our_mission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content_uz', 'content_ru', 'content_en'], 'string'],
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
            'content_uz' => 'Content Uz',
            'content_ru' => 'Content Ru',
            'content_en' => 'Content En',
        ];
    }
    public function save($runvalidation=true,$attributeNames=null)
    {
        $isInsert=$this->isNewRecord;
        $imageRightPath=Yii::getAlias("@app/web/app/images/".$this->image_right->name);
        $imageLeftPath=Yii::getAlias("@app/web/app/images/".$this->image_left->name);
        if($this->image_left&&$this->image_right)
        {
            $this->image=$this->image_left->name."/".$this->image_right;
        }
        $saved= parent::save($runvalidation,$attributeNames);
        if(!$saved)
        {
            return false;
        }
        if($isInsert)
        {
            if(!is_dir(dirname($imageRightPath)))
            {
                FileHelper::createDirectory(dirname($imageRightPath));
            }
        }
        if(!file_exists($imageRightPath))
        {
            $this->image_right->saveAs($imageRightPath);
        }
        if(!file_exists($imageLeftPath))
        {
            $this->image_left->saveAs($imageLeftPath);
        }
    }
}
