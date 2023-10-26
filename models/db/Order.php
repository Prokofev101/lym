<?php

namespace app\models\db;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property int $order_status_id
 * @property float|null $order_sum
 * @property int $order_create
 * @property int $order_edit
 * @property int $order_success
 *
 * @property Buyer[] $buyers
 * @property OrderStatus $orderStatus
 * @property OrderValue[] $orderValues
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
            [['order_status_id', 'order_create', 'order_edit', 'order_success'], 'required'],
            [['order_status_id', 'order_create', 'order_edit', 'order_success'], 'integer'],
            [['order_sum'], 'number'],
            [['order_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => OrderStatus::class, 'targetAttribute' => ['order_status_id' => 'status_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'order_status_id' => 'Order Status ID',
            'order_sum' => 'Order Sum',
            'order_create' => 'Order Create',
            'order_edit' => 'Order Edit',
            'order_success' => 'Order Success',
        ];
    }

    /**
     * Gets query for [[Buyers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuyers()
    {
        return $this->hasMany(Buyer::class, ['order_id' => 'order_id']);
    }

    /**
     * Gets query for [[OrderStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderStatus()
    {
        return $this->hasOne(OrderStatus::class, ['status_id' => 'order_status_id']);
    }

    /**
     * Gets query for [[OrderValues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderValues()
    {
        return $this->hasMany(OrderValue::class, ['order_id' => 'order_id']);
    }
}
