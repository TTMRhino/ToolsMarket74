<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $item_id
 * @property int|null $quantity
 * @property int|null $customers_id
 * @property int|null $price
 * @property string|null $item
 * @property int|null $total
 *
 * @property Customers $customers
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_id', 'quantity', 'customers_id', 'price', 'total'], 'integer'],
            [['item'], 'string', 'max' => 50],
            [['customers_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::className(), 'targetAttribute' => ['customers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'item_id' => 'Item ID',
            'quantity' => 'Quantity',
            'customers_id' => 'Customers ID',
            'price' => 'Price',
            'item' => 'Item',
            'total' => 'Total',
        ];
    }

    /**
     * Gets query for [[Customers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasOne(Customers::className(), ['id' => 'customers_id']);
    }
}
