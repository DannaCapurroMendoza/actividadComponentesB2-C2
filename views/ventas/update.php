<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ventas $model */

$this->title = Yii::t('app', 'Update Ventas: {name}', [
    'name' => $model->id_ventas,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ventas, 'url' => ['view', 'id_ventas' => $model->id_ventas]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ventas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
