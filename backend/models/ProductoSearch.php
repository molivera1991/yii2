<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Producto;

/**
 * ProductoSearch represents the model behind the search form about `common\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ProductoId', 'ProductoPrecio', 'ProductoStock', 'ProductoCategoria', 'ProductoComercio'], 'integer'],
            [['ProductoNombre', 'ProductoCodigoBarra', 'ProductoImagen1', 'ProductoImagen2', 'ProductoImagen3'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Producto::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ProductoId' => $this->ProductoId,
            'ProductoPrecio' => $this->ProductoPrecio,
            'ProductoStock' => $this->ProductoStock,
            'ProductoCategoria' => $this->ProductoCategoria,
            'ProductoComercio' => $this->ProductoComercio,
        ]);

        $query->andFilterWhere(['like', 'ProductoNombre', $this->ProductoNombre])
            ->andFilterWhere(['like', 'ProductoCodigoBarra', $this->ProductoCodigoBarra])
            ->andFilterWhere(['like', 'ProductoImagen1', $this->ProductoImagen1])
            ->andFilterWhere(['like', 'ProductoImagen2', $this->ProductoImagen2])
            ->andFilterWhere(['like', 'ProductoImagen3', $this->ProductoImagen3]);

        return $dataProvider;
    }
}
