<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\detalleventa $model */

$this->title = Yii::t('app', 'Update Detalleventa: {name}', [
    'name' => $model->ventas_id_ventas,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Detalleventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ventas_id_ventas, 'url' => ['view', 'ventas_id_ventas' => $model->ventas_id_ventas, 'computadoras_id_computadoras' => $model->computadoras_id_computadoras]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="detalleventa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
