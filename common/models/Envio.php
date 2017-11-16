<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "envio".
 *
 * @property integer $EnvioId
 * @property string $EnvioCreado
 * @property string $EnvioEstado
 * @property integer $UsuarioDespachador
 *
 * @property User $usuarioDespachador
 * @property User $usuarioDespachador0
 * @property Pedido[] $pedidos
 */
class Envio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'envio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EnvioCreado', 'EnvioEstado', 'UsuarioDespachador'], 'required'],
            [['EnvioCreado'], 'safe'],
            [['UsuarioDespachador'], 'integer'],
            [['EnvioEstado'], 'string', 'max' => 25],
            [['UsuarioDespachador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UsuarioDespachador' => 'id']],
            [['UsuarioDespachador'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['UsuarioDespachador' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EnvioId' => 'Envio ID',
            'EnvioCreado' => 'Envio Creado',
            'EnvioEstado' => 'Envio Estado',
            'UsuarioDespachador' => 'Usuario Despachador',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioDespachador()
    {
        return $this->hasOne(User::className(), ['id' => 'UsuarioDespachador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioDespachador0()
    {
        return $this->hasOne(User::className(), ['id' => 'UsuarioDespachador']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['PedidoEnvio' => 'EnvioId']);
    }

    //RELLENAR DROOPDOWNS o Select2 de Claves Foraneas
    public function getcomboUsuario() {
    $models = User::find()->asArray()->all();
    return ArrayHelper::map($models, 'id', 'name');
    }
}
