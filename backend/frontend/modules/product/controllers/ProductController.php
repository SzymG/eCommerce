<?php

namespace frontend\modules\product\controllers;

use frontend\modules\product\models\Product;
use Yii;
use yii\web\Response;

/**
 * Product controller for the `product` module
 */

class ProductController extends \yii\web\Controller
{
    /**
     * Function which extends parent behaviors, to avoid CORS
     * @return array Returns array of behaviors
     */
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

    /**
     * Action called from frontend to fetch products
     * @return array Returns array of products from database
     */

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
