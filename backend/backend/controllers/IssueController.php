<?php

namespace backend\controllers;

use Yii;
use common\models\ar\Issue;
use common\models\ars\IssueSearch;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\ForbiddenHttpException;

/**
 * IssueController implements the CRUD actions for Issue model.
 */
class IssueController extends Controller {

	protected $creatable = true;
	protected $editable = true;
	protected $removable = true;

	/* Behaviours are inherited */

    /**
     * Lists all Issue models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new IssueSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
			'searchModel' => $searchModel,
	        'dataProvider' => $dataProvider,
        	'withoutCreating' => !$this->creatable,
        	'withoutUpdating' => !$this->editable,
        	'withoutDeleting' => !$this->removable,
        ]);
    }

    /**
     * Displays a single Issue model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
			'model' => $this->findModel($id),
        	'withoutUpdating' => !$this->editable,
        	'withoutDeleting' => !$this->removable,
        ]);
    }

    /**
     * Creates a new Issue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
    	if(!$this->creatable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
        $model = new Issue();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else {
            return $this->render('create', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Issue model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
    	if(!$this->editable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
        $model = $this->findModel($id);

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } 
        else {
            return $this->render('update', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Issue model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
    	if(!$this->removable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
    	$transaction = Yii::$app->db->beginTransaction();
    	
    	try {
    		$this->findModel($id)->delete();
    		$transaction->commit();
        }
        catch(\Exception $e) {
        	$transaction->rollBack();
			Yii::$app->getSession()->setFlash('error', Yii::t('app', 'The object cannot be deleted because it is used by other objects.'));
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Issue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Issue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if(($model = Issue::findOne($id)) !== null) {
            return $model;
        } 
        else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist. Please verify the address of the page.'));
        }
    }
}
