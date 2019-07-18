<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $telephone
 * @property string $payment
 * @property string $delivery_id
 * @property string $products
 * @property string $comments
 * @property string $status_id
 * @property string $date_create
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment', 'products', 'comments'], 'string'],
            [['delivery_id', 'status_id', 'date_create'], 'integer'],
            [['name', 'surname', 'email', 'telephone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'payment' => 'Payment',
            'delivery_id' => 'Delivery ID',
            'products' => 'Products',
            'comments' => 'Comments',
            'status_id' => 'Status ID',
            'date_create' => 'Date Create',
        ];
    }
}
