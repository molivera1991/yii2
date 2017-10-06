<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $CategoriaId
 * @property string $CategoriaNombre
 * @property resource $CategoriaImagen
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

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CategoriaNombre'], 'required'],
            [['CategoriaImagen'], 'string'],
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