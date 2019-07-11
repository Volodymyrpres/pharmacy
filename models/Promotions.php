<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "promotions".
 *
 * @property int $id
 * @property string $meta_title
 * @property string $title
 * @property string $meta_description
 * @property string $url
 * @property string $content
 * @property string $name
 * @property string $image
 * @property int $category_id
 * @property int $product_id
 */
class Promotions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'url', 'content', 'name'], 'string'],
            [['category_id', 'product_id'], 'integer'],
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
            'category_id' => 'Category ID',
            'product_id' => 'Product ID',
        ];
    }
}
