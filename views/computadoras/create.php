<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Computadoras $model */

$this->title = Yii::t('app', 'Create Computadoras');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Computadoras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="computadoras-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
