<?php

use yii\db\Migration;

/**
 * Handles the creation of table `order`.
 */
class m190326_121642_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('order', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'surname' => $this->string(),
            'telephone' => $this->string(),
            'payment' => $this->text(),
            'delivery' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('order');
    }
}
