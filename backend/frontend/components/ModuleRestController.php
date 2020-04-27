<?php

namespace frontend\components;

use console\components\Migration;
use Yii;
use sizeg\jwt\Jwt;
use sizeg\jwt\JwtHttpBearerAuth;
use frontend\modules\auth\logic\UserLogic;
use common\components\MessageTrait;
use yii\filters\auth\HttpBearerAuth;

/**
 * @inheritdoc
 */
class ModuleRestController extends \yii\web\Controller {
    
    use MessageTrait;

    public $enableCsrfValidation = false;

    public function init() {
        parent::init();
        $this->enableCsrfValidation = false;
        Yii::$app->user->identityClass = 'frontend\components\User';
        Yii::$app->user->enableSession = false;
        Yii::$app->user->loginUrl = null;
    }

    public function behaviors() {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => HttpBearerAuth::className(),
//            'optional' => $this->anonymousActions(),
//        ];
//
//        return $behaviors;
        return array_merge(parent::behaviors(),[
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => ['localhost:3000'],
                    'Access-Control-Request-Method'    => ['POST', 'GET', 'PUT', 'DELETE', 'PATCH'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],
            'authenticator' => [
                'class' => HttpBearerAuth::className(),
                'optional' => $this->anonymousActions(),
            ]
        ]);
    }

    public function beforeAction($action) {
        if(!parent::beforeAction($action)) {
            return false;
        }
        // Jeśli te dane będą potrzebne w filtrze `AccessControl`, to należy stworzyć nowy filtr, który będzie wykonywał
        // poniższy kod i podpiąć go do `behaviors` między `JwtHttpBearerAuth` a `AccessControl`.
        $userId = Yii::$app->user->id;
    
        Yii::$app->params['currentUserId'] = $userId;

        Yii::$app->language = Yii::$app->request->headers->get('Language');
        
        return true;
    }

    public function anonymousActions() {
        return [];
    }
    
    protected function checkRole($roleSymbol) {
        if(!empty(Yii::$app->params['currentUserId'])) {
            $roles = Yii::$app->params['roles'];
            if(empty($roles) || !in_array($roleSymbol, $roles)) {
                throw new \yii\web\ForbiddenHttpException();
            }
        }
        
        return true;
    }
    
    public function runAction($id, $params = []) {
        if(isset($params['name']) && empty($id)) {
            $id = $params['name'];
            unset($params['name']);
        }
        
        return parent::runAction($id, $params);
    }
    
}
