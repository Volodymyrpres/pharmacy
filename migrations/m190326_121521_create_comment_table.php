<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m190326_121521_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'product_id' => $this->integer(),
            'status' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-post-user_id',
            'comment',
            'user_id'
        );

        $this->addForeignKey(
            'fk-post-user_id',
            'comment',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-product_id',
            'comment',
            'product_id'
        );

        $this->addForeignKey(
            'fk-product_id',
            'comment',
            'product_id',
            'product',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment');
    }
}
