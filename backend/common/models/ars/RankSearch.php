<?php

namespace common\models\ars;

use common\models\ar\Rank;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RankSearch represents the model behind the search form about `common\models\ar\Rank`.
 */
class RankSearch extends Rank {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
            [['symbol'], 'safe'],
            [['points_required'], 'safe'],
            [['url_icon'], 'safe'],
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
        $query = Rank::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if(!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'symbol', $this->symbol]);
        $query->andFilterWhere(['like', 'points_required', $this->points_required]);
        $query->andFilterWhere(['like', 'url_icon', $this->url_icon]);

        return $dataProvider;
    }
}
