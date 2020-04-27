<?php

namespace common\models\ars;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\PrizeTranslation;

/**
 * PrizeTranslationSearch represents the model behind the search form about `common\models\ar\PrizeTranslation`.
 */
class PrizeTranslationSearch extends PrizeTranslation {

    public $prize;
    public $language;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['prize_id', 'language_id'], 'integer'],
				[['name', 'prize', 'language'], 'safe'],
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
        $query = PrizeTranslation::find()->alias('pt');

        $query->joinWith(['prize p', 'language l']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['prize'] = [
            'asc' => ['p.symbol' => SORT_ASC],
            'desc' => ['p.symbol' => SORT_DESC],
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
            'pt.prize_id' => $this->prize_id,
            'pt.language_id' => $this->language_id,
        ])
        ->andFilterWhere(['like', 'p.symbol', $this->prize])
        ->andFilterWhere(['like', 'l.name', $this->language]);

		$query->andFilterWhere(['like', 'pt.name', $this->name]);

        return $dataProvider;
    }
}
