<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "buyer".
 *
 * @property int $order_id
 * @property string $buyer_email
 * @property string $buyer_phone
 * @property string $buyer_token
 *
 * @property Order $order
 */
class Buyer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buyer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'buyer_email', 'buyer_phone', 'buyer_token'], 'required'],
            [['order_id'], 'integer'],
            [['buyer_email', 'buyer_token'], 'string', 'max' => 45],
            [['buyer_phone'], 'string', 'max' => 12],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::class, 'targetAttribute' => ['order_id' => 'order_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'buyer_email' => 'Buyer Email',
            'buyer_phone' => 'Buyer Phone',
            'buyer_token' => 'Buyer Token',
        ];
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::class, ['order_id' => 'order_id']);
    }
}
