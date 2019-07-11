<?php

use yii\db\Migration;

/**
 * Handles the creation of table `brend`.
 */
class m190326_121137_create_brand_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'meta_title' => $this->string(),
            'title' => $this->string(),
            'meta_description' => $this->text(),
            'url' => $this->text(),
            'content' => $this->text(),
            'name' => $this->text(),
            'image' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('brand');
    }
}
