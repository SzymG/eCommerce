<?php

namespace backend\controllers;

use common\models\ar\RegionTranslation;
use common\models\ars\RegionTranslationSearch;
use Yii;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\ForbiddenHttpException;

/**
 * RegionTranslationController implements the CRUD actions for RegionTranslation model.
 */
class RegionTranslationController extends Controller {

	protected $creatable = true;
	protected $editable = true;
	protected $removable = true;

	/* Behaviours are inherited */

    /**
     * Lists all RegionTranslation models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new RegionTranslationSearch();
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
     * Displays a single RegionTranslation model.
     * @param integer $region_id
     * @param integer $language_id
     * @return mixed
     */
    public function actionView($region_id, $language_id) {
        return $this->render('view', [
			'model' => $this->findModel($region_id, $language_id),
        	'withoutUpdating' => !$this->editable,
        	'withoutDeleting' => !$this->removable,
        ]);
    }

    /**
     * Creates a new RegionTranslation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id = null) {
    	if(!$this->creatable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
        $model = new RegionTranslation();
        $model->region_id = $id;

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['region/view', 'id' => $model->region_id]);
        } 
        else {
            return $this->render('create', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RegionTranslation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $region_id
     * @param integer $language_id
     * @return mixed
     */
    public function actionUpdate($region_id, $language_id) {
    	if(!$this->editable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
        $model = $this->findModel($region_id, $language_id);

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        if($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['region/view', 'id' => $model->region_id]);
        } 
        else {
            return $this->render('update', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RegionTranslation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $region_id
     * @param integer $language_id
     * @return mixed
     */
    public function actionDelete($region_id, $language_id) {
    	if(!$this->removable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
    	$transaction = Yii::$app->db->beginTransaction();
    	
    	try {
    		$this->findModel($region_id, $language_id)->delete();
    		$transaction->commit();
        }
        catch(\Exception $e) {
        	$transaction->rollBack();
			Yii::$app->getSession()->setFlash('error', Yii::t('app', 'The object cannot be deleted because it is used by other objects.'));
        }

        return $this->redirect(['region/view', 'id' => $region_id]);
    }

    /**
     * Finds the RegionTranslation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $region_id
     * @param integer $language_id
     * @return RegionTranslation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($region_id, $language_id) {
        if(($model = RegionTranslation::findOne(['region_id' => $region_id, 'language_id' => $language_id])) !== null) {
            return $model;
        } 
        else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist. Please verify the address of the page.'));
        }
    }
}
