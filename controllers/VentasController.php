<?php

namespace app\controllers;

use app\models\ventas;
use app\models\ventasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VentasController implements the CRUD actions for ventas model.
 */
class VentasController extends Controller
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
     * Lists all ventas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ventasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ventas model.
     * @param int $id_ventas Id Ventas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_ventas)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_ventas),
        ]);
    }

    /**
     * Creates a new ventas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new ventas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_ventas' => $model->id_ventas]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ventas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_ventas Id Ventas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_ventas)
    {
        $model = $this->findModel($id_ventas);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_ventas' => $model->id_ventas]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ventas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_ventas Id Ventas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_ventas)
    {
        $this->findModel($id_ventas)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ventas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_ventas Id Ventas
     * @return ventas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_ventas)
    {
        if (($model = ventas::findOne(['id_ventas' => $id_ventas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
