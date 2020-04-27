<?php

use console\components\Migration;

class m190718_113439_add_date_publication_to_event_table extends Migration {

    public function safeUp() {
        $this->addColumn('event', 'date_publication', $this->timestamp()->notNull()->defaultValue(null)->after('date_end'));
    }

    public function safeDown() {
        $this->dropColumn('event', 'date_publication');
    }
}
