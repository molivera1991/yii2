<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "producto".
 *
 * @property integer $ProductoId
 * @property string $ProductoNombre
 * @property string $ProductoCodigoBarra
 * @property integer $ProductoPrecio
 * @property integer $ProductoStock
 * @property string $ProductoImagen1
 * @property string $ProductoImagen2
 * @property string $ProductoImagen3
 * @property integer $ProductoCategoria
 * @property integer $ProductoComercio
 *
 * @property Pedidoproducto[] $pedidoproductos
 * @property Pedido[] $pedidos
 * @property Categoria $productoCategoria
 * @property Comercio $productoComercio
 */
class Producto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'producto';
    }

    public $file;
    public $file2;
    public $file3;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductoNombre', 'ProductoCodigoBarra', 'ProductoPrecio', 'ProductoStock', 'ProductoCategoria', 'ProductoComercio'], 'required'],
            [['ProductoPrecio', 'ProductoStock', 'ProductoCategoria', 'ProductoComercio'], 'integer'],
            [['file'], 'file'],
            [['file2'], 'file'],
            [['file3'], 'file'],
            [['ProductoNombre', 'ProductoCodigoBarra'], 'string', 'max' => 45],
            [['ProductoImagen1', 'ProductoImagen2', 'ProductoImagen3'], 'string', 'max' => 200],
            [['ProductoCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['ProductoCategoria' => 'CategoriaId']],
            [['ProductoComercio'], 'exist', 'skipOnError' => true, 'targetClass' => Comercio::className(), 'targetAttribute' => ['ProductoComercio' => 'ComercioId']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ProductoId' => 'Producto ID',
            'ProductoNombre' => 'Producto Nombre',
            'ProductoCodigoBarra' => 'Producto Codigo Barra',
            'ProductoPrecio' => 'Producto Precio',
            'ProductoStock' => 'Producto Stock',
            // 'ProductoImagen1' => 'Producto Imagen1',
            // 'ProductoImagen2' => 'Producto Imagen2',
            // 'ProductoImagen3' => 'Producto Imagen3',
            'file' => 'Producto Imagen1',
            'file2' => 'Producto Imagen2',
            'file3' => 'Producto Imagen3',
            'ProductoCategoria' => 'Producto Categoria',
            'ProductoComercio' => 'Producto Comercio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoproductos()
    {
        return $this->hasMany(Pedidoproducto::className(), ['ProductoId' => 'ProductoId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidos()
    {
        return $this->hasMany(Pedido::className(), ['PedidoId' => 'PedidoId'])->viaTable('pedidoproducto', ['ProductoId' => 'ProductoId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoCategoria()
    {
        return $this->hasOne(Categoria::className(), ['CategoriaId' => 'ProductoCategoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoComercio()
    {
        return $this->hasOne(Comercio::className(), ['ComercioId' => 'ProductoComercio']);
    }

    //RELLENAR DROOPDOWNS o Select2 de Claves Foraneas
    public function getcomboCategoria() {
    $models = Categoria::find()->asArray()->all();
    return ArrayHelper::map($models, 'CategoriaId', 'CategoriaNombre');
    }

    public function getcomboComercio() {
    $models = Comercio::find()->asArray()->all();
    return ArrayHelper::map($models, 'ComercioId', 'ComercioNombre');
    }

    public function getunComercio($idcom) {
    return $models = Comercio::findOne($idcom);
    }

    public function getunCategoria($idcat) {
    return $models = Categoria::findOne($idcat);
    }
}
