<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m190326_121443_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'meta_title' => $this->string(),
            'title' => $this->string(),
            'meta_description' => $this->text(),
            'url' => $this->text(),
            'name' => $this->text(),
            'brand_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('category');
    }
}
