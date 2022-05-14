<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string|null $adress_uz
 * @property string|null $adress_ru
 * @property string|null $adress_en
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $facebook
 * @property string|null $telegram
 * @property string|null $instagram
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adress_uz', 'adress_ru', 'adress_en', 'phone', 'email', 'facebook', 'telegram', 'instagram'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'adress_uz' => 'Adress Uz',
            'adress_ru' => 'Adress Ru',
            'adress_en' => 'Adress En',
            'phone' => 'Phone',
            'email' => 'Email',
            'facebook' => 'Facebook',
            'telegram' => 'Telegram',
            'instagram' => 'Instagram',
        ];
    }
}
