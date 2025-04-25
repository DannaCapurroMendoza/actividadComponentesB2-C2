<?php

use app\models\Computadoras;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\ComputadorasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Computadoras');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computadoras-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Computadoras'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_computadoras',
            'marca',
            'modelo',
            'procesador',
            'ram',
            //'almacenamiento',
            //'precio',
            //'stock',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Computadoras $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_computadoras' => $model->id_computadoras]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
