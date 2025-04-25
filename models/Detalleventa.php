<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleventa".
 *
 * @property int $ventas_id_ventas
 * @property int|null $id_venta
 * @property int|null $id_computadora
 * @property int|null $cantidad
 * @property float|null $precio_unitario
 * @property float|null $subtotal
 * @property int $computadoras_id_computadoras
 *
 * @property Computadoras $computadorasIdComputadoras
 */
class Detalleventa extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalleventa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_venta', 'id_computadora', 'cantidad', 'precio_unitario', 'subtotal'], 'default', 'value' => null],
            [['id_venta', 'id_computadora', 'cantidad', 'computadoras_id_computadoras'], 'integer'],
            [['precio_unitario', 'subtotal'], 'number'],
            [['computadoras_id_computadoras'], 'required'],
            [['computadoras_id_computadoras'], 'exist', 'skipOnError' => true, 'targetClass' => Computadoras::class, 'targetAttribute' => ['computadoras_id_computadoras' => 'id_computadoras']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ventas_id_ventas' => Yii::t('app', 'Ventas Id Ventas'),
            'id_venta' => Yii::t('app', 'Id Venta'),
            'id_computadora' => Yii::t('app', 'Id Computadora'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio_unitario' => Yii::t('app', 'Precio Unitario'),
            'subtotal' => Yii::t('app', 'Subtotal'),
            'computadoras_id_computadoras' => Yii::t('app', 'Computadoras Id Computadoras'),
        ];
    }

    /**
     * Gets query for [[ComputadorasIdComputadoras]].
     *
     * @return \yii\db\ActiveQuery|ComputadorasQuery
     */
    public function getComputadorasIdComputadoras()
    {
        return $this->hasOne(Computadoras::class, ['id_computadoras' => 'computadoras_id_computadoras']);
    }

    /**
     * {@inheritdoc}
     * @return DetalleventaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetalleventaQuery(get_called_class());
    }

}
