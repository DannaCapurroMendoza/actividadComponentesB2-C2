<?php

namespace app\controllers;

use app\models\Computadoras;
use app\models\ComputadorasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ComputadorasController implements the CRUD actions for Computadoras model.
 */
class ComputadorasController extends Controller
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
     * Lists all Computadoras models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ComputadorasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Computadoras model.
     * @param int $id_computadoras Id Computadoras
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_computadoras)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_computadoras),
        ]);
    }

    /**
     * Creates a new Computadoras model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Computadoras();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_computadoras' => $model->id_computadoras]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Computadoras model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_computadoras Id Computadoras
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_computadoras)
    {
        $model = $this->findModel($id_computadoras);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_computadoras' => $model->id_computadoras]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Computadoras model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_computadoras Id Computadoras
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_computadoras)
    {
        $this->findModel($id_computadoras)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Computadoras model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_computadoras Id Computadoras
     * @return Computadoras the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_computadoras)
    {
        if (($model = Computadoras::findOne(['id_computadoras' => $id_computadoras])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
