<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Computadoras $model */

$this->title = $model->id_computadoras;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Computadoras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="computadoras-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_computadoras' => $model->id_computadoras], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_computadoras' => $model->id_computadoras], [
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
            'id_computadoras',
            'marca',
            'modelo',
            'procesador',
            'ram',
            'almacenamiento',
            'precio',
            'stock',
        ],
    ]) ?>

</div>
