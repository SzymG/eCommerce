<?php

namespace frontend\modules\product\controllers;

use Yii;
use yii\filters\Cors;
use yii\helpers\Json;
use yii\httpclient\Client;
use yii\web\Response;


/**
 * Payment controller for the `product` module
 */

class PaymentController extends \yii\web\Controller
{
    /**
     * @var Json Bought items, from frontend
     */
    public $cart;
    /**
     * @var string Token returned from PayU authorization
     */
    public $token;
    /**
     * @var array Data necessary for PayU order
     */
    public $data;
    /**
     * @var string Location returned from PayU successful order
     */
    public $redirectLocation;

    /**
     * Function which extends parent behaviors, to avoid CORS
     * @return array Returns array of behaviors
     */
    public function behaviors() {

        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => ['http://localhost:3000'],
                    'Access-Control-Request-Method'    => ['GET', 'POST'],
                    'Access-Control-Allow-Credentials' => true,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                    'Access-Control-Request-Headers' => ['*'],
                ],
            ],

        ]);
    }

    /**
     * Action which is responsible for PauU integration
     * @return array Returns PayU location, on which user can continue shopping
     * @throws \yii\base\InvalidConfigException
     */

    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $this->cart = JSON::decode(Yii::$app->request->get('cart'));

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://secure.snd.payu.com/pl/standard/user/oauth/authorize')
            ->addHeaders(['content-type' => 'application/x-www-form-urlencoded'])
            ->setData(['grant_type' => 'client_credentials', 'client_id' => '386265', 'client_secret' => '64921439dce22139e4d25ec1862a189c'])
            ->send();

        $this->token = Json::decode($response->content)['access_token'];

        $this->data = [
            "continueUrl" => "http://localhost:3000/success",
            "customerIp" => Yii::$app->getRequest()->getUserIP(),
            "merchantPosId" => "386265",
            "description" => "eCommerce market",
            "currencyCode" => "PLN",
        ];

        $products = [];
        $totalAmount = 0;

        foreach($this->cart as $item) {
            $totalAmount += $item['price'] * 100;
            array_push($products, [
                "name" => $item['name'],
                "unitPrice" =>  strval($item['price'] * 100),
                "quantity" => "1",
            ]);
        }

        $this->data['totalAmount'] = strval($totalAmount);
        $this->data['products'] = $products;

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setFormat(Client::FORMAT_JSON)
            ->setUrl('https://secure.snd.payu.com/api/v2_1/orders/')
            ->addHeaders(['content-type' => 'application/json'])
            ->addHeaders(['Authorization' => 'Bearer '.$this->token])
            ->setData($this->data)
            ->send();

        $responseHeaders = $response->headers;
        $this->redirectLocation = $responseHeaders['location'];

        return array('status' => true, 'data' => $this->redirectLocation);
    }

}
