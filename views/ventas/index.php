<?php

use app\models\ventas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ventasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Ventas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ventas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ventas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_ventas',
            'id_clientes',
            'id_empleado',
            'fecha',
            'total',
            //'clientes_id_clientes',
            //'empleados_id_empleados',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ventas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_ventas' => $model->id_ventas]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
