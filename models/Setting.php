<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string $title
 * @property string $email
 * @property string $phones
 * @property string $logo
 * @property string $currency
 * @property string $type
 */
class Setting extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phones', 'map'], 'string'],
            [['title', 'email', 'logo', 'currency', 'type'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'email' => 'Email',
            'phones' => 'Phones',
            'logo' => 'Logo',
            'currency' => 'Currency',
            'map' => 'Map',
            'type' => 'Type',
        ];
    }

    public function getSetting($setting){
        return Setting::find()->where(['type' => 'site'])->one()[$setting];
    }
}
