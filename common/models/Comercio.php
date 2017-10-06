<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comercio".
 *
 * @property integer $ComercioId
 * @property string $ComercioNombre
 * @property string $ComercioLatitud
 * @property string $ComercioLongitud
 * @property resource $ComercioLogo
 * @property integer $ComercioGerente
 *
 * @property Usuario $comercioGerente
 * @property Producto[] $productos
 */
class Comercio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comercio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ComercioNombre', 'ComercioLatitud', 'ComercioLongitud', 'ComercioGerente'], 'required'],
            [['ComercioLogo'], 'string'],
            [['ComercioGerente'], 'integer'],
            [['ComercioNombre', 'ComercioLatitud', 'ComercioLongitud'], 'string', 'max' => 45],
            [['ComercioGerente'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['ComercioGerente' => 'UsuarioId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ComercioId' => 'Comercio ID',
            'ComercioNombre' => 'Comercio Nombre',
            'ComercioLatitud' => 'Comercio Latitud',
            'ComercioLongitud' => 'Comercio Longitud',
            'ComercioLogo' => 'Comercio Logo',
            'ComercioGerente' => 'Comercio Gerente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComercioGerente()
    {
        return $this->hasOne(Usuario::className(), ['UsuarioId' => 'ComercioGerente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['ProductoComercio' => 'ComercioId']);
    }
}
