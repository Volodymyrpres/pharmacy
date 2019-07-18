<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $meta_title
 * @property string $name
 * @property string $meta_description
 * @property string $content
 * @property string $date
 * @property string $image
 * @property string $price
 * @property string $article
 * @property string $url
 * @property int $product_id
 * @property int $status
 * @property int $promotions_id
 * @property int $category_id
 * @property int $brand_id
 * @property int new_price
 *
 * @property Comment[] $comments
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'content', 'price', 'article', 'url'], 'string'],
            [['date'], 'safe'],
            [['product_id', 'status', 'promotions_id', 'category_id', 'brand_id', 'new_price'], 'integer'],
            [['meta_title', 'name', 'image'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'meta_description' => 'Meta Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'price' => 'Price',
            'article' => 'Article',
            'url' => 'Url',
            'product_id' => 'Product ID',
            'status' => 'Status',
            'promotions_id' => 'Promotions ID',
            'category_id' => 'Category ID',
            'brand_id' => 'Brand ID',
            'new_price' => 'New Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['product_id' => 'id']);
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    public function getBrand() {
        return $this->hasOne(Brand::className(), ['id' => 'brand_id']);
    }

}
