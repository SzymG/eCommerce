<?php

namespace frontend\forms;

use Yii;
use yii\base\Model;
use yii\helpers\Json;
use frontend\logic\mappers\IssueDataMapper;

/**
 * @property string $message
 * @property string $timestamp
 * @property string $url
 * @property string $errors
 * @property string $image
 * @property string $agent
 * @property string $cookies
 * @property string $platform
 * @property string $screenSize
 * @property string $availableScreenSize
 * @property string $innerSize
 * @property string $colorDepth
 * @property string $orientation
 * @property string $dateCreation
 */

class IssueForm extends Model {

    public $message;
    public $timestamp;
    public $url;
    public $errors;
    public $image;
    public $agent;
    public $cookies;
    public $platform;
    public $screenSize;
    public $availableScreenSize;
    public $innerSize;
    public $colorDepth;
    public $orientation;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['message', 'url'], 'required'],
            [['message', 'image'], 'string'],
            [['timestamp'], 'safe'],
            [['url', 'errors', 'cookies'], 'string', 'max' => 1024],
            [['agent'], 'string', 'max' => 512],
            [['platform'], 'string', 'max' => 64],
            [['colorDepth'], 'integer'],
            [['screenSize', 'availableScreenSize', 'innerSize', 'orientation'], 'string', 'max' => 128]
        ];
    }


    public function formName() {
        return '';
    }

    /*
	 * @return IssueDataMapper
    */
    public function convertFormToDataMapper() {
        $mapper = new IssueDataMapper();

        $mapper->message = $this->message;
        $mapper->timestamp = $this->timestamp;
        $mapper->url = $this->url;
        $mapper->errors = Json::encode($this->errors);
        if($this->image) {
            $imageExploded = explode(',', $this->image);
            $mapper->image = $imageExploded[1];
        }
        $mapper->agent = $this->agent;
        $mapper->cookies = $this->cookies;
        $mapper->platform = $this->platform;
        $mapper->screen_size = $this->screenSize;
        $mapper->available_screen_size = $this->availableScreenSize;
        $mapper->inner_size = $this->innerSize;
        $mapper->color_depth = $this->colorDepth;
        $mapper->orientation = $this->orientation;

        return $mapper;
    }
}