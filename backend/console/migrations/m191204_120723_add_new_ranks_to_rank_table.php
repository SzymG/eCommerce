<?php

use console\components\Migration;
use yii\db\Query;

class m191204_120723_add_new_ranks_to_rank_table extends Migration {

    public function safeUp() {
        try {
            $this->dropForeignKey('fk_user_rank', 'user');
        } catch (Exception $e) {}


        $this->delete('rank_translation');
        $this->delete('rank');

        $ranks = [
            ['ambassador', 100],
            ['platinum', 81],
            ['gold', 61],
            ['silver', 31],
            ['bronze', 0],
        ];

        $ranksEn = [
            'Ambassador',
            'Platinum',
            'Gold',
            'Silver',
            'Bronze',
        ];

        $ranksPl = [
            'Ambasador',
            'Platyna',
            'Złoto',
            'Srebro',
            'Brąz',
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
                'name' => $ranksEn[$key],
            ]);

            $this->insert('rank_translation', [
                'rank_id' => $rankId,
                'language_id' => $polishId,
                'name' => $ranksPl[$key],
            ]);

            Yii::$app->db->createCommand()
                ->update('user', ['rank_id' => $rankId], ['<=', 'total_points', $rank[1]])
                ->execute();
        }

        $this->addForeignKey('fk_user_rank', 'user', 'rank_id', 'rank', 'id');
    }

    public function safeDown() {
        $this->dropForeignKey('fk_user_rank', 'user');
        $this->delete('rank_translation');
        $this->delete('rank');
        Yii::$app->db->createCommand()
                ->update('user', ['rank_id' => null])
                ->execute();
        $this->addForeignKey('fk_user_rank', 'user', 'rank_id', 'rank', 'id');
    }
}
