<?php

use app\models\detalleventa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\detalleventaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Detalleventas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalleventa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Detalleventa'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ventas_id_ventas',
            'id_venta',
            'id_computadora',
            'cantidad',
            'precio_unitario',
            //'subtotal',
            //'computadoras_id_computadoras',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, detalleventa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'ventas_id_ventas' => $model->ventas_id_ventas, 'computadoras_id_computadoras' => $model->computadoras_id_computadoras]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
