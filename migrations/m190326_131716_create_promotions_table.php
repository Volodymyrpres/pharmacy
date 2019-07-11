<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%promotions}}`.
 */
class m190326_131716_create_promotions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%promotions}}', [
            'id' => $this->primaryKey(),
            'meta_title' => $this->string(),
            'title' => $this->string(),
            'meta_description' => $this->text(),
            'url' => $this->text(),
            'content' => $this->text(),
            'name' => $this->text(),
            'image' => $this->string(),
            'category_id' => $this->integer(),
            'product_id' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%promotions}}');
    }
}
