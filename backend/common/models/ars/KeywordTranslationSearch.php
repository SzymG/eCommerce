<?php

namespace common\models\ars;

use common\models\ar\KeywordTranslation;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * KeywordTranslationSearch represents the model behind the search form about `common\models\ar\KeywordTranslation`.
 */
class KeywordTranslationSearch extends KeywordTranslation {

    public $keyword;
    public $language;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['keyword_id', 'language_id'], 'integer'],
				[['name', 'keyword', 'language'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params) {
        $query = KeywordTranslation::find()->alias('kt');

        $query->joinWith(['keyword k', 'language l']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['keyword'] = [
            'asc' => ['k.symbol' => SORT_ASC],
            'desc' => ['k.symbol' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['language'] = [
            'asc' => ['l.name' => SORT_ASC],
            'desc' => ['l.name' => SORT_DESC],
        ];

        $this->load($params);

        if(!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'kt.keyword_id' => $this->keyword_id,
            'kt.language_id' => $this->language_id,
        ])
        ->andFilterWhere(['like', 'k.symbol', $this->keyword])
        ->andFilterWhere(['like', 'l.name', $this->language]);

		$query->andFilterWhere(['like', 'kt.name', $this->name]);

        return $dataProvider;
    }
}
