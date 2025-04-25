<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Computadoras;

/**
 * ComputadorasSearch represents the model behind the search form of `app\models\Computadoras`.
 */
class ComputadorasSearch extends Computadoras
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_computadoras', 'stock'], 'integer'],
            [['marca', 'modelo', 'procesador', 'ram', 'almacenamiento'], 'safe'],
            [['precio'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
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
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Computadoras::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_computadoras' => $this->id_computadoras,
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);

        $query->andFilterWhere(['like', 'marca', $this->marca])
            ->andFilterWhere(['like', 'modelo', $this->modelo])
            ->andFilterWhere(['like', 'procesador', $this->procesador])
            ->andFilterWhere(['like', 'ram', $this->ram])
            ->andFilterWhere(['like', 'almacenamiento', $this->almacenamiento]);

        return $dataProvider;
    }
}
