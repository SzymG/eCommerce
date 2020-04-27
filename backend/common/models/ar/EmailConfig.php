<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "email_config".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property integer $port
 * @property string $protocol
 * @property string $host
 * @property integer $starttls
 * @property integer $smtp_auth
 * @property string $noreply_email
 * @property string $from
 */
class EmailConfig extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'email_config';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['email', 'password', 'port', 'protocol', 'host'], 'required'],
			[['port', 'starttls', 'smtp_auth'], 'integer'],
			[['email', 'host', 'noreply_email', 'from'], 'string', 'max' => 64],
			[['password', 'protocol'], 'string', 'max' => 32],
			[['email', 'host'], 'unique', 'targetAttribute' => ['email', 'host']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'port' => Yii::t('app', 'Port'),
            'protocol' => Yii::t('app', 'Protocol'),
            'host' => Yii::t('app', 'Host'),
            'starttls' => Yii::t('app', 'Starttls'),
            'smtp_auth' => Yii::t('app', 'Smtp Auth'),
            'noreply_email' => Yii::t('app', 'Noreply Email'),
            'from' => Yii::t('app', 'From'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\EmailConfigQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\EmailConfigQuery(get_called_class());
    }
}
