<?php

use console\components\Migration;

class m191220_085004_add_pirmary_key_to_information_page_translation_table extends Migration {

    public function safeUp() {
        $this->addPrimaryKey('pk_information_page_translation', 'information_page_translation', ['information_page_id', 'language_id']);
    }

    public function safeDown() {
        $this->dropPrimaryKey('pk_information_page_translation', 'information_page_translation');
    }
}
