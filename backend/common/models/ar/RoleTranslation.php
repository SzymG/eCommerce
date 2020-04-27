<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "role_translation".
 *
 * @property integer $role_id
 * @property integer $language_id
 * @property string $name
 *
 * @property Language $language
 * @property Role $role
 */
class RoleTranslation extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'role_translation';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['role_id', 'language_id', 'name'], 'required'],
			[['role_id', 'language_id'], 'integer'],
			[['name'], 'string', 'max' => 128],
			[['role_id', 'language_id'], 'unique', 'targetAttribute' => ['role_id', 'language_id']],
			[['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
			[['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::className(), 'targetAttribute' => ['role_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'role_id' => Yii::t('app', 'Role ID'),
            'language_id' => Yii::t('app', 'Language ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage() {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole() {
        return $this->hasOne(Role::className(), ['id' => 'role_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\RoleTranslationQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\RoleTranslationQuery(get_called_class());
    }
}
