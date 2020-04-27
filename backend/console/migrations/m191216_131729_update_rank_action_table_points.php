<?php

use console\components\Migration;

class m191216_131729_update_rank_action_table_points extends Migration {

    public function safeUp() {
        $this->update('rank_action', ['points' => 0], ['symbol' => 'add_event']);
        $this->update('rank_action', ['points' => 5], ['symbol' => 'add_article']);
        $this->update('rank_action', ['points' => 0], ['symbol' => 'participate_event']);
        $this->update('rank_action', ['points' => 0], ['symbol' => 'unparticipate_event']);
    }

    public function safeDown() {

    }
}
