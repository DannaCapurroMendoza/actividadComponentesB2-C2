<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ventas;

/**
 * ventasSearch represents the model behind the search form of `app\models\ventas`.
 */
class ventasSearch extends ventas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ventas', 'id_clientes', 'id_empleado', 'clientes_id_clientes', 'empleados_id_empleados'], 'integer'],
            [['fecha'], 'safe'],
            [['total'], 'number'],
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
        $query = ventas::find();

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
            'id_ventas' => $this->id_ventas,
            'id_clientes' => $this->id_clientes,
            'id_empleado' => $this->id_empleado,
            'fecha' => $this->fecha,
            'total' => $this->total,
            'clientes_id_clientes' => $this->clientes_id_clientes,
            'empleados_id_empleados' => $this->empleados_id_empleados,
        ]);

        return $dataProvider;
    }
}
