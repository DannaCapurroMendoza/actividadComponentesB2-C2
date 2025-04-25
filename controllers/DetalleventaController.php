<?php

namespace app\controllers;

use app\models\detalleventa;
use app\models\detalleventaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetalleventaController implements the CRUD actions for detalleventa model.
 */
class DetalleventaController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all detalleventa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new detalleventaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single detalleventa model.
     * @param int $ventas_id_ventas Ventas Id Ventas
     * @param int $computadoras_id_computadoras Computadoras Id Computadoras
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ventas_id_ventas, $computadoras_id_computadoras)
    {
        return $this->render('view', [
            'model' => $this->findModel($ventas_id_ventas, $computadoras_id_computadoras),
        ]);
    }

    /**
     * Creates a new detalleventa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new detalleventa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ventas_id_ventas' => $model->ventas_id_ventas, 'computadoras_id_computadoras' => $model->computadoras_id_computadoras]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing detalleventa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ventas_id_ventas Ventas Id Ventas
     * @param int $computadoras_id_computadoras Computadoras Id Computadoras
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ventas_id_ventas, $computadoras_id_computadoras)
    {
        $model = $this->findModel($ventas_id_ventas, $computadoras_id_computadoras);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ventas_id_ventas' => $model->ventas_id_ventas, 'computadoras_id_computadoras' => $model->computadoras_id_computadoras]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing detalleventa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ventas_id_ventas Ventas Id Ventas
     * @param int $computadoras_id_computadoras Computadoras Id Computadoras
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ventas_id_ventas, $computadoras_id_computadoras)
    {
        $this->findModel($ventas_id_ventas, $computadoras_id_computadoras)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the detalleventa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ventas_id_ventas Ventas Id Ventas
     * @param int $computadoras_id_computadoras Computadoras Id Computadoras
     * @return detalleventa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ventas_id_ventas, $computadoras_id_computadoras)
    {
        if (($model = detalleventa::findOne(['ventas_id_ventas' => $ventas_id_ventas, 'computadoras_id_computadoras' => $computadoras_id_computadoras])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
