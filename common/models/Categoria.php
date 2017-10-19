<?php

namespace common\models;
use yii\helpers\ArrayHelper;
use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $CategoriaId
 * @property string $CategoriaNombre
 * @property string $CategoriaImagen
 *
 * @property Producto[] $productos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    public $file;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CategoriaNombre'], 'required'],
            [['file'], 'file'],
            [['CategoriaImagen'], 'string', 'max' => 200],
            [['CategoriaNombre'], 'string', 'max' => 45],
            [['CategoriaNombre'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CategoriaId' => 'Categoria ID',
            'CategoriaNombre' => 'Categoria Nombre',
            'CategoriaImagen' => 'Categoria Imagen',
            'file' => 'Categoria Imagen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['ProductoCategoria' => 'CategoriaId']);
    }
}
