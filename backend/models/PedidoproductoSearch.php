<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pedidoproducto;

/**
 * PedidoproductoSearch represents the model behind the search form about `common\models\Pedidoproducto`.
 */
class PedidoproductoSearch extends Pedidoproducto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PedidoId', 'ProductoId', 'PedidoProductoCantidad'], 'integer'],
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
        $query = Pedidoproducto::find();

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
            'PedidoId' => $this->PedidoId,
            'ProductoId' => $this->ProductoId,
            'PedidoProductoCantidad' => $this->PedidoProductoCantidad,
        ]);

        return $dataProvider;
    }
}
