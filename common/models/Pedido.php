<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pedido".
 *
 * @property integer $PedidoId
 * @property string $PedidoEstado
 * @property string $PedidoCreado
 * @property string $PedidoDestinoLatitud
 * @property string $PedidoDestinoLonguitud
 * @property string $PedidoNumeroSeguimiento
 * @property integer $PedidoCliente
 * @property integer $PedidoEnvio
 * @property integer $PedidoOrdenEnvio
 *
 * @property Envio $pedidoEnvio
 * @property User $pedidoCliente
 * @property Pedidoproducto[] $pedidoproductos
 * @property Producto[] $productos
 */
class Pedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pedido';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PedidoEstado', 'PedidoCreado', 'PedidoDestinoLatitud', 'PedidoDestinoLonguitud', 'PedidoNumeroSeguimiento', 'PedidoCliente'], 'required'],
            [['PedidoCreado'], 'safe'],
            [['PedidoCliente', 'PedidoEnvio', 'PedidoOrdenEnvio'], 'integer'],
            [['PedidoEstado'], 'string', 'max' => 25],
            [['PedidoDestinoLatitud', 'PedidoDestinoLonguitud', 'PedidoNumeroSeguimiento'], 'string', 'max' => 45],
            [['PedidoNumeroSeguimiento'], 'unique'],
            [['PedidoEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => Envio::className(), 'targetAttribute' => ['PedidoEnvio' => 'EnvioId']],
            [['PedidoCliente'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['PedidoCliente' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PedidoId' => 'Pedido ID',
            'PedidoEstado' => 'Pedido Estado',
            'PedidoCreado' => 'Pedido Creado',
            'PedidoDestinoLatitud' => 'Pedido Destino Latitud',
            'PedidoDestinoLonguitud' => 'Pedido Destino Longuitud',
            'PedidoNumeroSeguimiento' => 'Pedido Numero Seguimiento',
            'PedidoCliente' => 'Pedido Cliente',
            'PedidoEnvio' => 'Pedido Envio',
            'PedidoOrdenEnvio' => 'Pedido Orden Envio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoEnvio()
    {
        return $this->hasOne(Envio::className(), ['EnvioId' => 'PedidoEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoCliente()
    {
        return $this->hasOne(User::className(), ['id' => 'PedidoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoproductos()
    {
        return $this->hasMany(Pedidoproducto::className(), ['PedidoId' => 'PedidoId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['ProductoId' => 'ProductoId'])->viaTable('pedidoproducto', ['PedidoId' => 'PedidoId']);
    }
}
