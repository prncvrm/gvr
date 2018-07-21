<?php

namespace app\controllers;

use Yii;
use app\models\LeaveRequest;
use app\models\LeaveRequestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LeaveRequestController implements the CRUD actions for LeaveRequest model.
 */
class LeaveRequestController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all LeaveRequest models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeaveRequestSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LeaveRequest model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LeaveRequest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($EmpCode,$Date)
    {
      
        if (Yii::$app->request->isAjax) {
            $model=$this->_findModel($EmpCode,$Date);
            if($model==null){
                $model=new LeaveRequest;
                $model->RaisedById=Yii::$app->User->identity->id;
                $model->RaisedEmpId=$EmpCode;
                $model->Date=$Date;
                $model->Resolved=0;    
            }


            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return print_r("['success']");
            }
            return $this->renderAjax('create', [
                'model' => $model,
            ]);
        }
        else{
            print_r("Not Ajax Request");
        }
    }

    /**
     * Updates an existing LeaveRequest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LeaveRequest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LeaveRequest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return LeaveRequest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function _findModel($EmpId, $Date){
        if(($model=LeaveRequest::findOne(['RaisedEmpId'=>$EmpId,'Date'=>$Date])) !==null){
            return $model;
        }

    }
    protected function findModel($id)
    {
        if (($model = LeaveRequest::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}