<?php

namespace app\modules\adminpanel\controllers;

use app\controllers\SiteController;
use yii;
use app\models\ContactsForm;
use app\models\search\ContactsFormSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ContactsFormController implements the CRUD actions for ContactsForm model.
 */
class ContactsFormController extends Controller
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
     * Lists all ContactsForm models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ContactsFormSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ContactsForm model.
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
     * Creates a new ContactsForm model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ContactsForm();
        Yii::$app->response->format=yii\web\Response::FORMAT_JSON;
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        if (Yii::$app->request->isPost) {
            $data=Yii::$app->request->post();
            if ($model->load($data))
            {

                if($model->save()) {
                    return ['data'=>$model,'error'=>null];
                }
                else 
                {
                    return ['data'=>null,'error'=>$model->error];
                }
            }
            else
            {
                return ['data'=>null,'error'=>$model->error];
            }
            
            
        }
        else{
            return ['data'=>null,'error'=>$model->error];
        }
        return ['data'=>null,'error'=>$model->error];
    }

    /**
     * Updates an existing ContactsForm model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ContactsForm model.
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
     * Finds the ContactsForm model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ContactsForm the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ContactsForm::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
