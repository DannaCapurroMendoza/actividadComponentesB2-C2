<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property int $id_clientes
 * @property string|null $nombre
 * @property string|null $correo
 * @property string|null $telefono
 * @property string|null $direccion
 *
 * @property Ventas[] $ventas
 */
class Clientes extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'correo', 'telefono', 'direccion'], 'default', 'value' => null],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['telefono'], 'string', 'max' => 15],
            [['direccion'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_clientes' => Yii::t('app', 'Id Clientes'),
            'nombre' => Yii::t('app', 'Nombre'),
            'correo' => Yii::t('app', 'Correo'),
            'telefono' => Yii::t('app', 'Telefono'),
            'direccion' => Yii::t('app', 'Direccion'),
        ];
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::class, ['clientes_id_clientes' => 'id_clientes']);
    }

    /**
     * {@inheritdoc}
     * @return ClientesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClientesQuery(get_called_class());
    }

}
