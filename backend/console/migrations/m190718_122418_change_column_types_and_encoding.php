<?php

use console\components\Migration;

class m190718_122418_change_column_types_and_encoding extends Migration {

    public function safeUp() {
        $this->alterColumn('article', 'title', $this->string(255)->notNull());
        $this->execute('ALTER TABLE event_translation MODIFY title VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci;');
        $this->execute('ALTER TABLE event_translation MODIFY description TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci;');
    }

    public function safeDown() {
        $this->alterColumn('article', 'title', $this->string(128)->defaultValue('Default title'));
        $this->execute('ALTER TABLE event_translation MODIFY title VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci;');
        $this->execute('ALTER TABLE event_translation MODIFY description TEXT CHARACTER SET utf8 COLLATE utf8_general_ci;');
        //nie jestem pewny czy dobrze
    }
}
