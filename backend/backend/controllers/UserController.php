<?php

namespace backend\controllers;

use Yii;
use common\models\ar\User;
use common\models\ars\UserSearch;
use common\models\ar\UserPrize;
use common\models\ar\UserHistory;
use common\models\ar\UserRole;
use common\logic\DataLogic;
use common\helpers\FileHelper;
use common\helpers\UserHelper;
use backend\components\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\widgets\ActiveForm;
use yii\web\Response;
use yii\web\ForbiddenHttpException;
use yii\data\ActiveDataProvider;
use yii\helpers\Json;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

	protected $creatable = true;
	protected $editable = true;
	protected $removable = true;

	/* Behaviours are inherited */

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
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
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
            'userPrizeProvider' => new ActiveDataProvider([
                'query' => UserPrize::find()->where(['user_id' => $id])
            ]),
			'model' => $this->findModel($id),
        	'withoutUpdating' => !$this->editable,
            'withoutDeleting' => !$this->removable,
            'userId' => $id,
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
    	if(!$this->creatable) {
    		throw new ForbiddenHttpException(Yii::t('app', 'You cannot complete your request for security reasons.'));
    	}
    
        $model = new User();

        if(Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) {
        	Yii::$app->response->format = Response::FORMAT_JSON;
        	return ActiveForm::validate($model);
        }
        
        $snapshotBefore = null;
        $body = Yii::$app->request->post();

        if(!empty($body)) {
            $body[$model->formName()]['password'] = Yii::$app->getSecurity()->generatePasswordHash($body[$model->formName()]['password']);
        }

        if($model->load($body) && $model->save()) {
            $id = ($model->attributes)['id'];
            if($model->saveRoles($id)) {
                $snapshotAfter = UserHelper::makeSnapshot($id);
                UserHelper::createHistoryEntry($id, $snapshotBefore, $snapshotAfter);

                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        } 
        else {
            return $this->render('create', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
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
        
        $snapshotBefore = UserHelper::makeSnapshot($id);

        $body = Yii::$app->request->post();

        if(!empty($body)) {
            if(!empty($body[$model->formName()]['password'])) {
                $body[$model->formName()]['password'] = Yii::$app->getSecurity()->generatePasswordHash($body[$model->formName()]['password']);
            } else {
                $body[$model->formName()]['password'] = $model->attributes['password'];
            }
        }

        if($model->load($body) && $model->save()) {
            $snapshotAfter = UserHelper::makeSnapshot($id);
            UserHelper::createHistoryEntry($id, $snapshotBefore, $snapshotAfter);

            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            return $this->render('update', [
				'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $snapshotBefore = UserHelper::makeSnapshot($id);
        $user = (new DataLogic())->encryptUser($id);
        $snapshotAfter = UserHelper::makeSnapshot($id);
        UserHelper::createHistoryEntry($id, $snapshotBefore, $snapshotAfter);

        return $this->redirect(['index']);
    }

    public function actionPhoto($f) {
		return (new FileHelper())->getFile($f);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if(($model = User::findOne($id)) !== null) {
            return $model;
        } 
        else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist. Please verify the address of the page.'));
        }
    }

}
