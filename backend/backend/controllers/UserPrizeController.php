<?php

namespace backend\controllers;

use Yii;
use common\models\ar\UserPrize;
use common\models\ars\UserPrizeSearch;
use common\helpers\UserHelper;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\ForbiddenHttpException;

/**
 * UserPrizeController implements the CRUD actions for UserPrize model.
 */
class UserPrizeController extends Controller {

	protected $creatable = true;
	protected $editable = true;
	protected $removable = true;

	/* Behaviours are inherited */

    /**
     * Lists all UserPrize models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserPrizeSearch();
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
     * Displays a single UserPrize model.
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
     * Creates a new UserPrize model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null) {
    	if(!$this->creatable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
        $model = new UserPrize();
        $model->scenario = UserPrize::SCENARIO_PRIZE_REQUIRED;
        $model->user_id = $id;

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        $snapshotBefore = UserHelper::makeSnapshot($id);
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $snapshotAfter = UserHelper::makeSnapshot($id);
            UserHelper::createHistoryEntry($id, $snapshotBefore, $snapshotAfter);

            return $this->redirect(['user/view', 'id' => $model->user_id]);
        } 
        else {
            return $this->render('create', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing UserPrize model.
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
        
        $snapshotBefore = UserHelper::makeSnapshot($model->user_id);
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            $snapshotAfter = UserHelper::makeSnapshot($model->user_id);
            UserHelper::createHistoryEntry($model->user_id, $snapshotBefore, $snapshotAfter);

            return $this->redirect(['user/view', 'id' => $model->user_id]);
        } 
        else {
            return $this->render('update', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing UserPrize model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
    	if(!$this->removable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
        $model = $this->findModel($id);
        $transaction = Yii::$app->db->beginTransaction();
        $snapshotBefore = UserHelper::makeSnapshot($model->user_id);
    	
    	try {
            $model->delete();
            $snapshotAfter = UserHelper::makeSnapshot($model->user_id);
            UserHelper::createHistoryEntry($model->user_id, $snapshotBefore, $snapshotAfter);
    		$transaction->commit();
        }
        catch(\Exception $e) {
        	$transaction->rollBack();
			Yii::$app->getSession()->setFlash('error', Yii::t('app', 'The object cannot be deleted because it is used by other objects.'));
        }

        return $this->redirect(['user/view', 'id' => $model->user_id]);
    }

    /**
     * Finds the UserPrize model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserPrize the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if(($model = UserPrize::findOne($id)) !== null) {
            return $model;
        } 
        else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist. Please verify the address of the page.'));
        }
    }
}
