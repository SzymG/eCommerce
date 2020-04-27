<?php

use console\components\Migration;

class m190711_124659_create_table_agreements extends Migration {

    public function safeUp() {
        $this->createTable('agreement', [
			'id' => $this->primaryKey(11),
            'symbol' => $this->string(32)->notNull()->unique(),
            'is_required' => $this->boolean()->notNull()->defaultValue(false),
        ]);

        $this->createTable('agreement_translation', [
            'agreement_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'content' => $this->text(),
        ]);

        $this->addForeignKey('fk_agreement_translation_agreement', 'agreement_translation', 'agreement_id', 'agreement', 'id');
        $this->addForeignKey('fk_agreement_translation_language', 'agreement_translation', 'language_id', 'language', 'id');

        $this->createTable('user_agreement', [
            'id' => $this->primaryKey(11),
            'user_id' => $this->integer(11)->notNull(),
            'agreement_id' => $this->integer(11)->notNull(),
            'is_accepted' => $this->boolean()->notNull()->defaultValue(false),
            'date' => $this->timestamp()->notNull()
        ]);

        $this->alterColumn('user_agreement', 'date', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');
    }

    public function safeDown() {
        $this->dropTable('user_agreement');
        $this->dropTable('agreement_translation');
        $this->dropTable('agreement');
    }
}
