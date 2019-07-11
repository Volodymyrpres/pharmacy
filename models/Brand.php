<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property int $id
 * @property string $meta_title
 * @property string $title
 * @property string $meta_description
 * @property string $url
 * @property string $content
 * @property string $name
 * @property string $image
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'url', 'content', 'name'], 'string'],
            [['meta_title', 'title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'meta_title' => 'Meta Title',
            'title' => 'Title',
            'meta_description' => 'Meta Description',
            'url' => 'Url',
            'content' => 'Content',
            'name' => 'Name',
            'image' => 'Image',
        ];
    }
}
