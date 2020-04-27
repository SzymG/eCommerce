<?php

use console\components\Migration;

class m190904_081858_insert_rank_action_unparticipate_event extends Migration {

    public function safeUp() {
        $this->insert('rank_action', [
            'symbol' => 'unparticipate_event',
            'points' => -10,
        ]);
    }

    public function safeDown() {
        $this->delete('rank_action', ['symbol' => 'unparticipate_event']);
    }
}
