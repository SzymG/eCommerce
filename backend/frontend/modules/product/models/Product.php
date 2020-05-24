<?php

namespace frontend\modules\product\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id Product id
 * @property string $name Product name
 * @property string|null $description Product description
 * @property string|null $photo_url Product photo url
 * @property int|null $price Product price
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * Name of the table
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * Rules of product model
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['price'], 'integer'],
            [['name', 'photo_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * Product model labels
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'photo_url' => 'Photo Url',
            'price' => 'Price',
        ];
    }
}
