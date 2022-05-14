<?php

namespace app\models;

use Yii;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "about".
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
class About extends \yii\db\ActiveRecord
{
    public $image1;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about';
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
        $imagePath=Yii::getAlias('@app/web/app/images/'.$this->image1->name);

        if($this->image1)
        {
            $this->image=$this->image1->name;
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
