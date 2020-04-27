<?php

use console\components\Migration;
use yii\db\Query;

class m190829_132400_insert_ranks extends Migration {

    public function safeUp() {
        $ranks = [
            ['rank1', 0],
            ['rank2', 10],
            ['rank3', 20],
            ['rank4', 50],
            ['rank5', 70],
            ['rank6', 100],
        ];

        $ranksPl = [
            'ranga1',
            'ranga2',
            'ranga3',
            'ranga4',
            'ranga5',
            'ranga6',    
        ];

        $polishId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);
        $englishId = (new Query)->select('id')->from('language')->where(['symbol' => 'en']);
        foreach($ranks as $key => $rank) {
            $this->insert('rank', [
                'symbol' => $rank[0],
                'points_required' => $rank[1],
            ]);

            $rankId = $this->db->getLastInsertID();
            
            $this->insert('rank_translation', [
                'rank_id' => $rankId,
                'language_id' => $englishId,
                'name' => $rank[0],
            ]);

            $this->insert('rank_translation', [
                'rank_id' => $rankId,
                'language_id' => $polishId,
                'name' => $ranksPl[$key],
            ]);
        }

        $rankActions = [
            ['add_event', 10],
            ['add_article', 10],
        ];
        $this->batchInsert('rank_action', ['symbol', 'points'], $rankActions);
    }

    public function safeDown() {
        $this->delete('user_action', ['is not', 'rank_action_id', null]);
        $this->delete('rank_action');
        $this->update('user', ['rank_id' => null], ['is not', 'rank_id', null]);
        $this->delete('rank_translation');
        $this->delete('rank');
    }
}
