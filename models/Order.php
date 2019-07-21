<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use Yii;
use yii\db\Expression;

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
 * @property string $qty
 * @property string $sum
 * @property string $comments
 * @property string $status_id
 * @property string $date_create
 */
class Order extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['date_create'],
//                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function getOrderItems() {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email', 'telephone'], 'required'],
            [['payment', 'comments'], 'string'],
            [['sum'], 'number'],
            [['delivery_id', 'qty', 'status_id', 'date_create'], 'integer'],
            [['name', 'surname', 'email', 'telephone'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'email' => 'E-mail',
            'telephone' => 'Телефон',
//            'payment' => 'Оплата',
//            'delivery_id' => 'Доставка',
            //'qty' => 'Qty',
            //'sum' => 'Sum',
            'comments' => 'Комментарий',
            //'status_id' => 'Status ID',
            //'date_create' => 'Date Create',
        ];
    }
}
