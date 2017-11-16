<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "pedidoproducto".
 *
 * @property integer $PedidoId
 * @property integer $ProductoId
 * @property integer $PedidoProductoCantidad
 *
 * @property Pedido $pedido
 * @property Producto $producto
 */
class Pedidoproducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedidoproducto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PedidoId', 'ProductoId', 'PedidoProductoCantidad'], 'required'],
            [['PedidoId', 'ProductoId', 'PedidoProductoCantidad'], 'integer'],
            [['PedidoId'], 'exist', 'skipOnError' => true, 'targetClass' => Pedido::className(), 'targetAttribute' => ['PedidoId' => 'PedidoId']],
            [['ProductoId'], 'exist', 'skipOnError' => true, 'targetClass' => Producto::className(), 'targetAttribute' => ['ProductoId' => 'ProductoId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PedidoId' => 'Pedido ID',
            'ProductoId' => 'Producto ID',
            'PedidoProductoCantidad' => 'Pedido Producto Cantidad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedido::className(), ['PedidoId' => 'PedidoId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Producto::className(), ['ProductoId' => 'ProductoId']);
    }

    public function getcomboPedido() {
    $models = Pedido::find()->asArray()->all();
    return ArrayHelper::map($models, 'PedidoId', 'PedidoId');
    }

    public function getcomboProducto() {
    $models = Producto::find()->asArray()->all();
    return ArrayHelper::map($models, 'ProductoId', 'ProductoNombre');
    }

}
