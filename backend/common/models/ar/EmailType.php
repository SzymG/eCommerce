<?php

namespace common\models\ar;

use Yii;

/**
 * This is the model class for table "email_type".
 *
 * @property integer $id
 * @property string $symbol
 * @property string $tags
 * @property integer $is_archived
 * @property integer $is_active
 *
 * @property EmailTemplate[] $emailTemplates
 * @property Language[] $languages
 */
class EmailType extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'email_type';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['symbol', 'is_active'], 'required'],
			[['is_archived', 'is_active'], 'integer'],
			[['symbol'], 'string', 'max' => 32],
			[['tags'], 'string', 'max' => 128],
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
            'tags' => Yii::t('app', 'Tags'),
            'is_archived' => Yii::t('app', 'Is Archived'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailTemplates() {
        return $this->hasMany(EmailTemplate::className(), ['email_type_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguages() {
        return $this->hasMany(Language::className(), ['id' => 'language_id'])->viaTable('email_template', ['email_type_id' => 'id']);
    }

    public function getTagList() {
        if ($this->tags === null || $this->tags === '') {
            return [];
        }
        return explode(',', $this->tags);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\EmailTypeQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\EmailTypeQuery(get_called_class());
    }

    public function getBestTemplate() {
		$templates = $this->emailTemplates;

		foreach($templates as $template) {
			if($template->language->symbol === Yii::$app->language) {
				return $template;
			}
		}

		if(!empty($templates)) {
			return $templates[0];
		}

		return null;
	}

	public function replacePlaceholders($content, $overwritedTags) {
		foreach ($this->tagList as $tag) {
			$replacement = isset($overwritedTags[$tag]) ? $overwritedTags[$tag] : '';
			$content = str_replace($tag, $replacement, $content);
		}

		return $content;
	}
}
