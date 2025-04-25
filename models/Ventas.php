<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property int $id_ventas
 * @property int|null $id_clientes
 * @property int|null $id_empleado
 * @property string|null $fecha
 * @property float|null $total
 * @property int $clientes_id_clientes
 * @property int $empleados_id_empleados
 *
 * @property Clientes $clientesIdClientes
 * @property Empleados $empleadosIdEmpleados
 */
class Ventas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clientes', 'id_empleado', 'fecha', 'total'], 'default', 'value' => null],
            [['id_clientes', 'id_empleado', 'clientes_id_clientes', 'empleados_id_empleados'], 'integer'],
            [['fecha'], 'safe'],
            [['total'], 'number'],
            [['clientes_id_clientes', 'empleados_id_empleados'], 'required'],
            [['clientes_id_clientes'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['clientes_id_clientes' => 'id_clientes']],
            [['empleados_id_empleados'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::class, 'targetAttribute' => ['empleados_id_empleados' => 'id_empleados']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ventas' => Yii::t('app', 'Id Ventas'),
            'id_clientes' => Yii::t('app', 'Id Clientes'),
            'id_empleado' => Yii::t('app', 'Id Empleado'),
            'fecha' => Yii::t('app', 'Fecha'),
            'total' => Yii::t('app', 'Total'),
            'clientes_id_clientes' => Yii::t('app', 'Clientes Id Clientes'),
            'empleados_id_empleados' => Yii::t('app', 'Empleados Id Empleados'),
        ];
    }

    /**
     * Gets query for [[ClientesIdClientes]].
     *
     * @return \yii\db\ActiveQuery|ClientesQuery
     */
    public function getClientesIdClientes()
    {
        return $this->hasOne(Clientes::class, ['id_clientes' => 'clientes_id_clientes']);
    }

    /**
     * Gets query for [[EmpleadosIdEmpleados]].
     *
     * @return \yii\db\ActiveQuery|EmpleadosQuery
     */
    public function getEmpleadosIdEmpleados()
    {
        return $this->hasOne(Empleados::class, ['id_empleados' => 'empleados_id_empleados']);
    }

    /**
     * {@inheritdoc}
     * @return VentasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VentasQuery(get_called_class());
    }

}
