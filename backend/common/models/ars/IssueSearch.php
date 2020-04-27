<?php

namespace common\models\ars;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\Issue;

/**
 * IssueSearch represents the model behind the search form about `common\models\ar\Issue`.
 */
class IssueSearch extends Issue {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'color_depth'], 'integer'],
				[['message', 'timestamp', 'url', 'errors', 'image', 'agent', 'cookies', 'platform', 'screen_size', 'available_screen_size', 'inner_size', 'orientation', 'date_creation'], 'safe'],
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
        $query = Issue::find();

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
            'timestamp' => $this->timestamp,
            'color_depth' => $this->color_depth,
            'date_creation' => $this->date_creation,
        ]);

		$query->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'errors', $this->errors])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'agent', $this->agent])
            ->andFilterWhere(['like', 'cookies', $this->cookies])
            ->andFilterWhere(['like', 'platform', $this->platform])
            ->andFilterWhere(['like', 'screen_size', $this->screen_size])
            ->andFilterWhere(['like', 'available_screen_size', $this->available_screen_size])
            ->andFilterWhere(['like', 'inner_size', $this->inner_size])
            ->andFilterWhere(['like', 'orientation', $this->orientation]);

        return $dataProvider;
    }
}
