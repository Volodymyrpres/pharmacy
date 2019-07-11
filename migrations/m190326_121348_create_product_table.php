<?php

use yii\db\Migration;

/**
 * Handles the creation of table `product`.
 */
class m190326_121348_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'meta_title' => $this->string(),
            'title' => $this->string(),
            'meta_description' => $this->text(),
            'content' => $this->text(),
            'date' => $this->date(),
            'image' => $this->string(),
            'price' => $this->text(),
            'article' => $this->text(),
            'url' => $this->text(),
            'product_id' => $this->integer(),
            'status' => $this->integer(),
            'promotions_id' => $this->integer(),
            'category_id' => $this->integer(),
            'brand_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('product');
    }
}
