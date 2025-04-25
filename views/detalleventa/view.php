<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\detalleventa $model */

$this->title = $model->ventas_id_ventas;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalleventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="detalleventa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'ventas_id_ventas' => $model->ventas_id_ventas, 'computadoras_id_computadoras' => $model->computadoras_id_computadoras], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'ventas_id_ventas' => $model->ventas_id_ventas, 'computadoras_id_computadoras' => $model->computadoras_id_computadoras], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'ventas_id_ventas',
            'id_venta',
            'id_computadora',
            'cantidad',
            'precio_unitario',
            'subtotal',
            'computadoras_id_computadoras',
        ],
    ]) ?>

</div>
