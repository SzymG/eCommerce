<?php

use console\components\Migration;

class m190910_112325_add_primary_key_in_rank_and_prize_translation extends Migration {

    public function safeUp() {
        $this->addPrimaryKey('pk_rank_translation', 'rank_translation', ['rank_id', 'language_id']);
        $this->addPrimaryKey('pk_prize_translation', 'prize_translation', ['prize_id', 'language_id']);
    }

    public function safeDown() {
        $this->dropForeignKey('fk_rank_translation_rank', 'rank_translation');
        $this->dropForeignKey('fk_rank_translation_language', 'rank_translation');
        $this->dropPrimaryKey('pk_rank_translation', 'rank_translation');
        $this->addForeignKey('fk_rank_translation_rank', 'rank_translation', 'rank_id', 'rank', 'id');
        $this->addForeignKey('fk_rank_translation_language', 'rank_translation', 'language_id', 'language', 'id');

        $this->dropForeignKey('fk_prize_translation_prize', 'prize_translation');
        $this->dropForeignKey('fk_prize_translation_language', 'prize_translation');
        $this->dropPrimaryKey('pk_prize_translation', 'prize_translation');
        $this->addForeignKey('fk_prize_translation_prize', 'prize_translation', 'prize_id', 'prize', 'id');
        $this->addForeignKey('fk_prize_translation_language', 'prize_translation', 'language_id', 'language', 'id');
    }
}
