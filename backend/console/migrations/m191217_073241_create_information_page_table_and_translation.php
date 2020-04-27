<?php

use console\components\Migration;

class m191217_073241_create_information_page_table_and_translation extends Migration {

    public function safeUp() {
        $this->createTable('information_page', [
            'id' => $this->primaryKey(),
            'symbol' => $this->text()->notNull()
        ]);

        $this->createTable('information_page_translation', [
            'information_page_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'name' => $this->text()->notNull(),
        ]);

        $this->addForeignKey('fk_information_page_translation_information_page', 'information_page_translation', 'information_page_id', 'information_page', 'id');
        $this->addForeignKey('fk_information_page_translation_language', 'information_page_translation', 'language_id', 'language', 'id');
        $this->alterColumn('information_page_translation', 'name', 'mediumtext NOT NULL');
    }

    public function safeDown() {
        $this->dropTable('information_page_translation');
        $this->dropTable('information_page');
    }
}
