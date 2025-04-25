<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ventasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ventas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_ventas') ?>

    <?= $form->field($model, 'id_clientes') ?>

    <?= $form->field($model, 'id_empleado') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'clientes_id_clientes') ?>

    <?php // echo $form->field($model, 'empleados_id_empleados') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
