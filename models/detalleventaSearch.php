<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\detalleventa;

/**
 * detalleventaSearch represents the model behind the search form of `app\models\detalleventa`.
 */
class detalleventaSearch extends detalleventa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ventas_id_ventas', 'id_venta', 'id_computadora', 'cantidad', 'computadoras_id_computadoras'], 'integer'],
            [['precio_unitario', 'subtotal'], 'number'],
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
        $query = detalleventa::find();

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
            'ventas_id_ventas' => $this->ventas_id_ventas,
            'id_venta' => $this->id_venta,
            'id_computadora' => $this->id_computadora,
            'cantidad' => $this->cantidad,
            'precio_unitario' => $this->precio_unitario,
            'subtotal' => $this->subtotal,
            'computadoras_id_computadoras' => $this->computadoras_id_computadoras,
        ]);

        return $dataProvider;
    }
}
