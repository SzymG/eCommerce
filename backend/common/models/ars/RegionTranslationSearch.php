<?php

namespace common\models\ars;

use common\models\ar\RegionTranslation;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RegionTranslationSearch represents the model behind the search form about `common\models\ar\RegionTranslation`.
 */
class RegionTranslationSearch extends RegionTranslation {

    public $region;
    public $language;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['region_id', 'language_id'], 'integer'],
				[['name', 'region', 'language'], 'safe'],
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
        $query = RegionTranslation::find()->alias('rt');

        $query->joinWith(['region r', 'language l']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['region'] = [
            'asc' => ['r.symbol' => SORT_ASC],
            'desc' => ['r.symbol' => SORT_DESC],
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
            'rt.region_id' => $this->region_id,
            'rt.language_id' => $this->language_id,
        ])
        ->andFilterWhere(['like', 'r.symbol', $this->region])
        ->andFilterWhere(['like', 'l.name', $this->language]);

		$query->andFilterWhere(['like', 'rt.name', $this->name]);

        return $dataProvider;
    }
}
