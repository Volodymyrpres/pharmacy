<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $meta_title
 * @property string $title
 * @property string $meta_description
 * @property string $url
 * @property string $name
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_description', 'url', 'name'], 'string'],
            [['parent_id'], 'integer'],
            [['meta_title', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent_ID',
            'meta_title' => 'Meta Title',
            'title' => 'Title',
            'meta_description' => 'Meta Description',
            'url' => 'Url',
            'name' => 'Name',
        ];
    }

    public function getArticles()
    {
        return $this->hasMany(Article::className(), ['category_id' =>'id']);
    }



    public function getProducts() {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }
}
