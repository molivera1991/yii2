<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $UsuarioId
 * @property string $UsuarioNombre
 * @property string $UsuarioApellido
 * @property string $UsuarioCI
 * @property string $UsuarioMail
 *
 * @property Comercio[] $comercios
 * @property Envio[] $envios
 * @property Pedido[] $pedidos
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UsuarioNombre', 'UsuarioApellido', 'UsuarioCI', 'UsuarioMail'], 'required'],
            [['UsuarioNombre', 'UsuarioApellido', 'UsuarioMail'], 'string', 'max' => 45],
            [['UsuarioCI'], 'string', 'max' => 8],
            [['UsuarioCI'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UsuarioId' => 'Usuario ID',
            'UsuarioNombre' => 'Usuario Nombre',
            'UsuarioApellido' => 'Usuario Apellido',
            'UsuarioCI' => 'Usuario Ci',
            'UsuarioMail' => 'Usuario Mail',
        ];
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function setPassword($password)
    {
        $this->UsuarioPass = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComercios()
    {
        return $this->hasMany(Comercio::className(), ['ComercioGerente' => 'UsuarioId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnvios()
    {
        return $this->hasMany(Envio::className(), ['UsuarioDespachador' => 'UsuarioId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['PedidoCliente' => 'UsuarioId']);
    }
}
