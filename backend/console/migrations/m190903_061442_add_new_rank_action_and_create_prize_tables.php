<?php

use console\components\Migration;

class m190903_061442_add_new_rank_action_and_create_prize_tables extends Migration {

    public function safeUp() {
        $this->insert('rank_action', [
            'symbol' => 'participate_event',
            'points' => 10,
        ]);

        $this->createTable('prize', [
            'id' => $this->primaryKey(),
            'symbol' => $this->string(128),
        ]);

        $this->createTable('prize_translation', [
            'prize_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'name' => $this->string(64)->notNull(),
        ]);

        $this->addForeignKey('fk_prize_translation_prize', 'prize_translation', 'prize_id', 'prize', 'id');
        $this->addForeignKey('fk_prize_translation_language', 'prize_translation', 'language_id', 'language', 'id');

        $this->createTable('user_prize', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11),
            'prize_id' => $this->integer(11),
            'date_creation' => 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->addForeignKey('fk_user_prize_user', 'user_prize', 'user_id', 'user', 'id');
        $this->addForeignKey('fk_user_prize_prize', 'user_prize', 'prize_id', 'prize', 'id');
    }

    public function safeDown() {
        $this->dropTable('user_prize');
        $this->dropTable('prize_translation');
        $this->dropTable('prize');
        $this->delete('rank_action', ['symbol' => 'participate_event']);   
    }
}
