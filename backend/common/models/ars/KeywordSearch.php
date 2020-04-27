<?php

namespace common\models\ars;

use common\models\ar\Keyword;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * KeywordSearch represents the model behind the search form about `common\models\ar\Keyword`.
 */
class KeywordSearch extends Keyword {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id'], 'integer'],
				[['symbol'], 'safe'],
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
        $query = Keyword::find();

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

        return $dataProvider;
    }
}
