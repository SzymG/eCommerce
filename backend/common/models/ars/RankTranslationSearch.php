<?php

namespace common\models\ars;

use common\models\ar\Rank;
use common\models\ar\RankTranslation;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RankTranslationSearch represents the model behind the search form about `common\models\ar\RankTranslation`.
 */
class RankTranslationSearch extends RankTranslation {

    public $rank;
    public $language;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['rank_id', 'language_id'], 'integer'],
            [['name', 'rank', 'language'], 'safe'],
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
        $query = RankTranslation::find()->alias('rt');

        $query->joinWith(['rank r', 'language l']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['rank'] = [
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
            'rt.rank_id' => $this->rank_id,
            'rt.language_id' => $this->language_id,
        ])
            ->andFilterWhere(['like', 'r.symbol', $this->rank])
            ->andFilterWhere(['like', 'l.name', $this->language]);

        $query->andFilterWhere(['like', 'rt.name', $this->name]);

        return $dataProvider;
    }
}
