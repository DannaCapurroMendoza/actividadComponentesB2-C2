<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\detalleventaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="detalleventa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'ventas_id_ventas') ?>

    <?= $form->field($model, 'id_venta') ?>

    <?= $form->field($model, 'id_computadora') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'precio_unitario') ?>

    <?php // echo $form->field($model, 'subtotal') ?>

    <?php // echo $form->field($model, 'computadoras_id_computadoras') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
