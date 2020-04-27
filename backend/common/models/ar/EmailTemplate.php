<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "email_template".
 *
 * @property integer $email_type_id
 * @property integer $language_id
 * @property string $subject
 * @property string $content_html
 * @property string $content_text
 *
 * @property EmailType $emailType
 * @property Language $language
 */
class EmailTemplate extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'email_template';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['email_type_id', 'language_id', 'subject', 'content_html'], 'required'],
			[['email_type_id', 'language_id'], 'integer'],
			[['content_html', 'content_text'], 'string'],
			[['subject'], 'string', 'max' => 256],
			[['email_type_id', 'language_id'], 'unique', 'targetAttribute' => ['email_type_id', 'language_id']],
			[['email_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmailType::className(), 'targetAttribute' => ['email_type_id' => 'id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'email_type_id' => Yii::t('app', 'Email Type ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'subject' => Yii::t('app', 'Subject'),
            'content_html' => Yii::t('app', 'Content Html'),
            'content_text' => Yii::t('app', 'Content Text'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailType() {
        return $this->hasOne(EmailType::className(), ['id' => 'email_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\EmailTemplateQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\EmailTemplateQuery(get_called_class());
    }
}
