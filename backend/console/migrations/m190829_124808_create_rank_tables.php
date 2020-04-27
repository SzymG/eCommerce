<?php

use console\components\Migration;

class m190829_124808_create_rank_tables extends Migration {

    public function safeUp() {
        $this->createTable('rank', [
            'id' => $this->primaryKey(),
            'symbol' => $this->string(64)->notNull(),
            'points_required' => $this->integer(11),
        ]);

        $this->createTable('rank_translation', [
            'rank_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'name' => $this->string(64)->notNull(),
        ]);

        $this->addForeignKey('fk_rank_translation_rank', 'rank_translation', 'rank_id', 'rank', 'id');
        $this->addForeignKey('fk_rank_translation_language', 'rank_translation', 'language_id', 'language', 'id');

        $this->createTable('rank_action', [
            'id' => $this->primaryKey(),
            'symbol' => $this->string(64),
            'points' => $this->integer(11),
        ]);

        $this->addColumn('user', 'total_points', $this->integer(11)->defaultValue(0));
        $this->addColumn('user', 'rank_id', $this->integer(11));

        $this->addForeignKey('fk_user_rank', 'user', 'rank_id', 'rank', 'id');

        $this->addColumn('user_action', 'rank_action_id', $this->integer(11));

        $this->addForeignKey('fk_user_action_rank_action', 'user_action', 'rank_action_id', 'rank_action', 'id');      
    }

    public function safeDown() {
        $this->dropForeignKey('fk_user_action_rank_action', 'user_action');
        $this->dropColumn('user_action', 'rank_action_id');
        $this->dropForeignKey('fk_user_rank', 'user');
        $this->dropColumn('user', 'rank_id');
        $this->dropColumn('user', 'total_points');
        $this->dropTable('rank_action');
        $this->dropTable('rank_translation');
        $this->dropTable('rank');
    }
}
