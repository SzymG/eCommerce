<?php

namespace common\models\ar;

use Yii;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use common\components\UploadTrait;
use common\helpers\UploadHelper;

/**
 * This is the model class for table "rank".
 *
 * @property integer $id
 * @property string $symbol
 * @property integer $points_required
 *
 * @property RankTranslation[] $rankTranslations
 * @property User[] $users
 */
class Rank extends \yii\db\ActiveRecord {

    use UploadTrait;

    public $file_photo;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'rank';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol'], 'required'],
			[['points_required'], 'integer'],
			[['symbol'], 'string', 'max' => 64],
			[['url_icon'], 'string'],
            [['file_photo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'symbol' => Yii::t('app', 'Symbol'),
            'points_required' => Yii::t('app', 'pointsRequired'),
            'url_icon' => Yii::t('app', 'urlIcon'),
            'file_photo' => Yii::t('app', 'icon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankTranslations() {
        return $this->hasMany(RankTranslation::className(), ['rank_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(User::className(), ['rank_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\RankQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\RankQuery(get_called_class());
    }

    public function getNormalizedPhotoUrl($url) {
        return FileHelper::normalizePath(UploadHelper::getUploadPath().'/'.explode('?f=', $url)[1]);
    }

    public function upload($nameSet) {
        if(!$this->file_photo) {
            return true;
        }
        if ($this->validate()) {
            return $result = $this->file_photo->saveAs($nameSet['fullName']) ? $nameSet['fullName'] : null;
        } else {
            return false;
        }
    }

    public function unlinkPhoto($photo) {
        $fileToUnlink = UploadHelper::getUploadPath().'/'.$photo;
        if(file_exists($fileToUnlink)) {
            unlink(UploadHelper::getUploadPath().'/'.$photo);
        }
        return true;
    }
}
