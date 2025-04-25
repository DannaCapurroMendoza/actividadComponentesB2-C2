<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Computadoras $model */

$this->title = Yii::t('app', 'Update Computadoras: {name}', [
    'name' => $model->id_computadoras,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Computadoras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_computadoras, 'url' => ['view', 'id_computadoras' => $model->id_computadoras]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="computadoras-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
