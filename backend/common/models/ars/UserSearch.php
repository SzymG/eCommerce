<?php

namespace common\models\ars;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\User;

/**
 * UserSearch represents the model behind the search form about `common\models\ar\User`.
 */
class UserSearch extends User {

    public $rank;
    public $region;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'is_public', 'is_fb_public', 'is_success_story_public', 'region_id', 'is_active', 'is_deleted', 'verification_code', 'total_points', 'rank_id'], 'integer'],
            [['password', 'email', 'facebook_url', 'first_name', 'last_name', 'description', 'career', 'birth_year', 'url_photo', 'date_creation', 'auth_token'], 'safe'],
            [['rank', 'region'], 'safe'],
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
        $query = User::find();

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
            'is_public' => $this->is_public,
            'is_fb_public' => $this->is_fb_public,
            'is_success_story_public' => $this->is_success_story_public,
            'region_id' => $this->region_id,
            'is_active' => $this->is_active,
            'is_deleted' => $this->is_deleted,
            'date_creation' => $this->date_creation,
            'verification_code' => $this->verification_code,
            'total_points' => $this->total_points,
            'rank_id' => $this->rank_id,
        ]);

		$query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'facebook_url', $this->facebook_url])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'career', $this->career])
            ->andFilterWhere(['like', 'birth_year', $this->birth_year])
            ->andFilterWhere(['like', 'url_photo', $this->url_photo])
            ->andFilterWhere(['like', 'auth_token', $this->auth_token]);

        return $dataProvider;
    }
}
