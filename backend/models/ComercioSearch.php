<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Comercio;

/**
 * ComercioSearch represents the model behind the search form about `common\models\Comercio`.
 */
class ComercioSearch extends Comercio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ComercioId', 'ComercioGerente'], 'integer'],
            [['ComercioNombre', 'ComercioLatitud', 'ComercioLongitud', 'ComercioLogo'], 'safe'],
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
        $query = Comercio::find();

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
            'ComercioId' => $this->ComercioId,
            'ComercioGerente' => $this->ComercioGerente,
        ]);

        $query->andFilterWhere(['like', 'ComercioNombre', $this->ComercioNombre])
            ->andFilterWhere(['like', 'ComercioLatitud', $this->ComercioLatitud])
            ->andFilterWhere(['like', 'ComercioLongitud', $this->ComercioLongitud])
            ->andFilterWhere(['like', 'ComercioLogo', $this->ComercioLogo]);

        return $dataProvider;
    }
}
