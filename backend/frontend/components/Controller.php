<?php

namespace frontend\components;

use Yii;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\Response;

/**
 * @inheritdoc
 */
class Controller {	
	
	protected $guzzle;

	public function __construct() {
		
		$this->guzzle = new \GuzzleHttp\Client(['http_errors' => false]);
    }

	public function sendHttpRequest($method, $service, $params = null, $body = null) {
		try {
			$params = $params ?: [];
			$params['headers'] = [];

			if(!Yii::$app->user->isGuest) {
				$params['headers']['Authorization'] = 'Bearer '.Yii::$app->user->identity->authToken;
			}

			if(!empty($body)) {
			    if(in_array(strtolower($method), ['get', 'delete'])) {
                    $params['query'] = Json::decode($body, true);
			    }
			    elseif(in_array(strtolower($method), ['post', 'put'])) {
                    $params['body'] = $body;
			    }
			}

			$params['headers']['Content-Type'] = 'application/json';

            $apiResponse = $this->guzzle->request($method, Url::base(true).$service, $params);

            $statusCode = $apiResponse->getStatusCode();
            if(((int) $statusCode) === 401) {
                Yii::$app->user->logout();
                $response = Yii::$app->response;
                $response->format = Response::FORMAT_JSON;
                $response->data = [
                    'redirectUrl' => Url::to(Yii::$app->user->loginUrl),
                    // 'message' => Yii::t('app', 'notAuthorizedToViewPageLogInAgain'),
                ];
                $response->statusCode = 401;
                // Standard RFC7235 wymaga, aby dla kodu odpowiedzi 401 został ustawiony nagłówek 'WWW-Authenticate'.
                $response->headers->set('WWW-Authenticate', $apiResponse->getHeader('WWW-Authenticate'));
                Yii::$app->end();
            }

            return $apiResponse;
		}
		catch(\Exception $e) {
		    Yii::error($e->getMessage());
		    Yii::error($e->getTraceAsString());
			return null;
		}
	}
}
