<?php

use console\components\Migration;
use yii\db\Query;

class m191021_064721_create_keyword_tables extends Migration {

    public function safeUp() {
        $languagePlId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);
        $languageEnId = (new Query)->select('id')->from('language')->where(['symbol' => 'en']);

        $this->createTable('keyword', [
            'id' => $this->primaryKey(11),
            'symbol' => $this->string(64)->notNull(),
        ]);
        $this->createTable('keyword_translation', [
            'keyword_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'name' => $this->string(128)->notNull(),
        ]);

        $this->addPrimaryKey('pk_keyword_translation', 'keyword_translation', ['keyword_id', 'language_id']);
        $this->addForeignKey('fk_keyword_translation_keyword', 'keyword_translation', 'keyword_id', 'keyword', 'id');
        $this->addForeignKey('fk_keyword_translation_language', 'keyword_translation', 'language_id', 'language', 'id');

        $this->createTable('user_keyword', [
            'user_id' => $this->integer(11)->notNull(),
            'keyword_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey('fk_user_keyword_user', 'user_keyword', 'user_id', 'user', 'id');
        $this->addForeignKey('fk_user_keyword_keyword', 'user_keyword', 'keyword_id', 'keyword', 'id');

        $this->insert('keyword', ['symbol' => 'programmer']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Programista',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Programmer',
        ]);

        $this->insert('keyword', ['symbol' => 'chemistry']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Chemia',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Chemistry',
        ]);

        $this->insert('keyword', ['symbol' => 'math']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Matematyka',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Math',
        ]);

        $this->insert('keyword', ['symbol' => 'mechatronics']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Mechatronika',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Mechatronics',
        ]);

        $this->insert('keyword', ['symbol' => 'automation']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Automatyka',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Automation',
        ]);

        $this->insert('keyword', ['symbol' => 'robotics']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Robotyka',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Robotics',
        ]);

        $this->insert('keyword', ['symbol' => 'architecture']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Architektura',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Architecture',
        ]);

        $this->insert('keyword', ['symbol' => 'management']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Zarządzanie',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Management',
        ]);

        $this->insert('keyword', ['symbol' => 'telecommunication']);
        $keywordId = $this->db->getLastInsertID();
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languagePlId,
            'name' => 'Telekomunikacja',
        ]);
        $this->insert('keyword_translation', [
            'keyword_id' => $keywordId,
            'language_id' => $languageEnId,
            'name' => 'Telecommunication',
        ]);
    }

    public function safeDown() {
        $this->dropTable('keyword');
        $this->dropTable('keyword_translation');
        $this->dropTable('user_keyword');
    }
}
