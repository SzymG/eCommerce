<?php

namespace frontend\modules\product\controllers;

use frontend\modules\product\models\Product;
use Yii;
use yii\web\Response;

class ProductController extends \yii\web\Controller
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
                ],
            ],

        ]);
    }

    public function actionIndex()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;

        $products = Product::find()->all();
        if(count($products) > 0) {
            return array('status' => true, 'data' => $products);
        } else {
            return array('status' => false, 'data' => 'No products');
        }
    }

}
