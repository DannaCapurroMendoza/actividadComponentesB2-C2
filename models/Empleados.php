<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property int $id_empleados
 * @property string|null $nombre
 * @property string|null $cargo
 * @property string|null $correo
 * @property string|null $telefono
 *
 * @property Ventas[] $ventas
 */
class Empleados extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'cargo', 'correo', 'telefono'], 'default', 'value' => null],
            [['nombre', 'correo'], 'string', 'max' => 100],
            [['cargo'], 'string', 'max' => 50],
            [['telefono'], 'string', 'max' => 15],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_empleados' => Yii::t('app', 'Id Empleados'),
            'nombre' => Yii::t('app', 'Nombre'),
            'cargo' => Yii::t('app', 'Cargo'),
            'correo' => Yii::t('app', 'Correo'),
            'telefono' => Yii::t('app', 'Telefono'),
        ];
    }

    /**
     * Gets query for [[Ventas]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVentas()
    {
        return $this->hasMany(Ventas::class, ['empleados_id_empleados' => 'id_empleados']);
    }

    /**
     * {@inheritdoc}
     * @return EmpleadosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpleadosQuery(get_called_class());
    }

}
