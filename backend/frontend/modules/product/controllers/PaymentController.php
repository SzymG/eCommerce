<?php

namespace frontend\modules\product\controllers;

use Yii;
use yii\helpers\Json;
use yii\httpclient\JsonParser;
use yii\web\Response;
use yii\httpclient\Client;


class PaymentController extends \yii\web\Controller
{
    public function behaviors() {

        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
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

    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $cart = JSON::decode(Yii::$app->request->get('cart'));

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('https://secure.snd.payu.com/pl/standard/user/oauth/authorize')
            ->addHeaders(['content-type' => 'application/x-www-form-urlencoded'])
            ->setData(['grant_type' => 'client_credentials', 'client_id' => '386265', 'client_secret' => '64921439dce22139e4d25ec1862a189c'])
            ->send();

        $token = Json::decode($response->content)['access_token'];

        $data = [
            "continueUrl" => "http://localhost:3000/success",
            "customerIp" => Yii::$app->getRequest()->getUserIP(),
            "merchantPosId" => "386265",
            "description" => "eCommerce market",
            "currencyCode" => "PLN",
        ];

        $products = [];
        $totalAmount = 0;

        foreach($cart as $item) {
            $totalAmount += $item['price'] * 100;
            array_push($products, [
                "name" => $item['name'],
                "unitPrice" =>  strval($item['price'] * 100),
                "quantity" => "1",
            ]);
        }

        $data['totalAmount'] = strval($totalAmount);
        $data['products'] = $products;

        $client = new Client();
        $response = $client->createRequest()
            ->setMethod('POST')
            ->setFormat(Client::FORMAT_JSON)
            ->setUrl('https://secure.snd.payu.com/api/v2_1/orders/')
            ->addHeaders(['content-type' => 'application/json'])
            ->addHeaders(['Authorization' => 'Bearer '.$token])
            ->setData($data)
            ->send();

        return array('status' => true, 'data' => ($response->headers)['location']);
    }

}
