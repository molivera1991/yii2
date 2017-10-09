<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "comercio".
 *
 * @property integer $ComercioId
 * @property string $ComercioNombre
 * @property string $ComercioLatitud
 * @property string $ComercioLongitud
 * @property string $ComercioLogo
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

    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ComercioNombre', 'ComercioLatitud', 'ComercioLongitud', 'ComercioGerente'], 'required'],
            [['ComercioGerente'], 'integer'],
            [['file'], 'file'],
            [['ComercioNombre', 'ComercioLatitud', 'ComercioLongitud'], 'string', 'max' => 45],
            [['ComercioLogo'], 'string', 'max' => 200],
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
            //'ComercioLogo' => 'Comercio Logo',
            'file' => 'Comercio Logo',
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

    //RELLENAR DROOPDOWNS o Select2 de Claves Foraneas
    public function getcomboUsuario() {
    $models = Usuario::find()->asArray()->all();
    return ArrayHelper::map($models, 'UsuarioId', 'UsuarioNombre');
    }
    public function getunUsuario($idusu) {
    return $models = Usuario::findOne($idusu);
    //return ArrayHelper::map($models, 'UsuarioId', 'UsuarioNombre');
    }
}
