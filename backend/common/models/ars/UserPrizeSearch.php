<?php

namespace common\models\ars;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\UserPrize;

/**
 * UserPrizeSearch represents the model behind the search form about `common\models\ar\UserPrize`.
 */
class UserPrizeSearch extends UserPrize {

    public $userEmail;
    public $prize;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'user_id', 'prize_id'], 'integer'],
				[['date_creation', 'userEmail', 'prize'], 'safe'],
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
        $query = UserPrize::find();

        $query->joinWith(['user u', 'prize p']);
        $query->leftJoin('prize_translation pt', 'pt.prize_id = p.id');
        $query->leftJoin('language l', 'pt.language_id = l.id');
        $query->where(['l.symbol' => Yii::$app->language]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['userEmail'] = [
            'asc' => ['u.email' => SORT_ASC],
            'desc' => ['u.email' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['prize'] = [
            'asc' => ['pt.name' => SORT_ASC],
            'desc' => ['pt.name' => SORT_DESC],
        ];

        $this->load($params);

        if(!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'prize_id' => $this->prize_id,
            'date_creation' => $this->date_creation,
        ])
        ->andFilterWhere(['like', 'u.email', $this->userEmail])
        ->andFilterWhere(['like', 'pt.name', $this->prize]);

        return $dataProvider;
    }
}
