<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Empleados $model */

$this->title = Yii::t('app', 'Update Empleados: {name}', [
    'name' => $model->id_empleados,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleados, 'url' => ['view', 'id_empleados' => $model->id_empleados]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="empleados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
