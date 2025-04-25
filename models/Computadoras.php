<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "computadoras".
 *
 * @property int $id_computadoras
 * @property string|null $marca
 * @property string|null $modelo
 * @property string|null $procesador
 * @property string|null $ram
 * @property string|null $almacenamiento
 * @property float|null $precio
 * @property int|null $stock
 *
 * @property Detalleventa[] $detalleventas
 */
class Computadoras extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'computadoras';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marca', 'modelo', 'procesador', 'ram', 'almacenamiento', 'precio', 'stock'], 'default', 'value' => null],
            [['precio'], 'number'],
            [['stock'], 'integer'],
            [['marca', 'modelo', 'ram', 'almacenamiento'], 'string', 'max' => 50],
            [['procesador'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_computadoras' => Yii::t('app', 'Id Computadoras'),
            'marca' => Yii::t('app', 'Marca'),
            'modelo' => Yii::t('app', 'Modelo'),
            'procesador' => Yii::t('app', 'Procesador'),
            'ram' => Yii::t('app', 'Ram'),
            'almacenamiento' => Yii::t('app', 'Almacenamiento'),
            'precio' => Yii::t('app', 'Precio'),
            'stock' => Yii::t('app', 'Stock'),
        ];
    }

    /**
     * Gets query for [[Detalleventas]].
     *
     * @return \yii\db\ActiveQuery|DetalleventaQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::class, ['computadoras_id_computadoras' => 'id_computadoras']);
    }

    /**
     * {@inheritdoc}
     * @return ComputadorasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComputadorasQuery(get_called_class());
    }

}
