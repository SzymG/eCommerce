<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "role".
 *
 * @property integer $id
 * @property string $symbol
 *
 * @property RoleTranslation[] $roleTranslations
 * @property Language[] $languages
 * @property UserRole[] $userRoles
 * @property User[] $users
 */
class Role extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'role';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol'], 'required'],
			[['symbol'], 'string', 'max' => 64]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'symbol' => Yii::t('app', 'Symbol'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoleTranslations() {
        return $this->hasMany(RoleTranslation::className(), ['role_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages() {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('role_translation', ['role_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles() {
        return $this->hasMany(UserRole::className(), ['role_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers() {
        return $this->hasMany(User::className(), ['id' => 'user_id'])->viaTable('user_role', ['role_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\RoleQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\RoleQuery(get_called_class());
    }

    public function getName() {
        $translation = $this->getRoleTranslations()->joinWith('language l')->where(['l.symbol' => Yii::$app->language])->one();
        return !empty($translation) ? $translation->name : $this->symbol;
    }
}
