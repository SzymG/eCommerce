<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "language".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $name
 *
 * @property AgreementTranslation[] $agreementTranslations
 * @property ArticleStatusTranslation[] $articleStatusTranslations
 * @property ArticleStatus[] $articleStatuses
 * @property EmailTemplate[] $emailTemplates
 * @property EmailType[] $emailTypes
 * @property EventTranslation[] $eventTranslations
 * @property Event[] $events
 * @property PrizeTranslation[] $prizeTranslations
 * @property RankTranslation[] $rankTranslations
 * @property RegionTranslation[] $regionTranslations
 * @property Region[] $regions
 * @property RoleTranslation[] $roleTranslations
 * @property Role[] $roles
 */
class Language extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'language';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol', 'name'], 'required'],
			[['symbol'], 'string', 'max' => 5],
			[['name'], 'string', 'max' => 32],
			[['symbol'], 'unique']
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'symbol' => Yii::t('app', 'Symbol'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAgreementTranslations() {
        return $this->hasMany(AgreementTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleStatusTranslations() {
        return $this->hasMany(ArticleStatusTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticleStatuses() {
        return $this->hasMany(ArticleStatus::className(), ['id' => 'article_status_id'])->viaTable('article_status_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailTemplates() {
        return $this->hasMany(EmailTemplate::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailTypes() {
        return $this->hasMany(EmailType::className(), ['id' => 'email_type_id'])->viaTable('email_template', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventTranslations() {
        return $this->hasMany(EventTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvents() {
        return $this->hasMany(Event::className(), ['id' => 'event_id'])->viaTable('event_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrizeTranslations() {
        return $this->hasMany(PrizeTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRankTranslations() {
        return $this->hasMany(RankTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegionTranslations() {
        return $this->hasMany(RegionTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegions() {
        return $this->hasMany(Region::className(), ['id' => 'region_id'])->viaTable('region_translation', ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleTranslations() {
        return $this->hasMany(RoleTranslation::className(), ['language_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoles() {
        return $this->hasMany(Role::className(), ['id' => 'role_id'])->viaTable('role_translation', ['language_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\LanguageQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\LanguageQuery(get_called_class());
    }
}
