<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `common\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UsuarioId'], 'integer'],
            [['UsuarioNombre', 'UsuarioApellido', 'UsuarioCI', 'UsuarioMail'], 'safe'],
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
        $query = Usuario::find();

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
            'UsuarioId' => $this->UsuarioId,
        ]);

        $query->andFilterWhere(['like', 'UsuarioNombre', $this->UsuarioNombre])
            ->andFilterWhere(['like', 'UsuarioApellido', $this->UsuarioApellido])
            ->andFilterWhere(['like', 'UsuarioCI', $this->UsuarioCI])
            ->andFilterWhere(['like', 'UsuarioMail', $this->UsuarioMail]);

        return $dataProvider;
    }
}
