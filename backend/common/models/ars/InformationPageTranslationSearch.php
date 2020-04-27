<?php

namespace common\models\ars;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ar\InformationPageTranslation;

/**
 * InformationPageTranslationSearch represents the model behind the search form about `common\models\ar\InformationPageTranslation`.
 */
class InformationPageTranslationSearch extends InformationPageTranslation {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['information_page_id', 'language_id'], 'integer'],
				[['name'], 'safe'],
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
        $query = InformationPageTranslation::find();

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
            'information_page_id' => $this->information_page_id,
            'language_id' => $this->language_id,
        ]);

		$query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
