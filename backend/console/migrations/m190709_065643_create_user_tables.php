<?php

use console\components\Migration;

class m190709_065643_create_user_tables extends Migration {

    public function safeUp() {
        $this->createTable('language', [
			'id' => $this->primaryKey(11),
			'symbol' => $this->string(5)->notNull()->unique(),
			'name' => $this->string(32)->notNull(),
        ]);

        $this->createTable('user', [
            'id' => $this->primaryKey(11),
            'password' => $this->string(256)->null(),
            'email' => $this->string(128)->notNull()->unique(),
            'first_name' => $this->string(128)->notNull(),
            'last_name' => $this->string(128)->notNull(),
            'description' => $this->text(),
            'career' => $this->string(256)->notNull(),
            'birth_year' => $this->string(32),
            'url_photo' => $this->string(256),
            'is_public' => $this->boolean()->notNull()->defaultValue(false),
            'region_id' => $this->integer(11)->notNull(),
            'is_active' => $this->boolean()->notNull()->defaultValue(true),
            'is_deleted' => $this->boolean()->notNull()->defaultValue(false),
            'date_creation' => $this->timestamp()->notNull(),
            'auth_token' => $this->string(512)->null(),
        ]);

        $this->alterColumn('user', 'date_creation', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');

        $this->createTable('role', [
            'id' => $this->primaryKey(11),
            'symbol' => $this->string(64)->notNull(),
        ]);

        $this->createTable('role_translation', [
            'role_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'name' => $this->string(128)->notNull(),
        ]);

        $this->addPrimaryKey('pk_role_translation', 'role_translation', ['role_id', 'language_id']);
        $this->addForeignKey('fk_role_translation_role', 'role_translation', 'role_id', 'role', 'id');
        $this->addForeignKey('fk_role_translation_language', 'role_translation', 'language_id', 'language', 'id');

        $this->createTable('user_role', [
            'user_id' => $this->integer(11)->notNull(),
            'role_id' => $this->integer(11)->notNull(),
        ]);

        $this->addForeignKey('fk_user_role_user', 'user_role', 'user_id', 'user', 'id');
        $this->addForeignKey('fk_user_role_role', 'user_role', 'role_id', 'role', 'id');

        $this->createTable('user_history', [
            'id' => $this->primaryKey(11),
            'user_subject_id' => $this->integer(11)->notNull(), // specjalnie bez klucza obcego
            'user_id' => $this->integer(11)->notNull(),
            'data_before' => $this->text()->null(),
            'data_after' => $this->text()->null(),
            'date_creation' => $this->timestamp()->notNull(),
        ]);
        
        $this->alterColumn('user_history', 'date_creation', 'TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP');

        $this->createTable('region', [
            'id' => $this->primaryKey(11),
            'symbol' => $this->string(128)->notNull()
        ]);

        $this->createTable('region_translation', [
            'region_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'name' => $this->string(128)->notNull(),
        ]);

        $this->addPrimaryKey('pk_region_translation', 'region_translation', ['region_id', 'language_id']);
        $this->addForeignKey('fk_region_translation_region', 'region_translation', 'region_id', 'region', 'id');
        $this->addForeignKey('fk_region_translation_language', 'region_translation', 'language_id', 'language', 'id');
        $this->addForeignKey('fk_user_region', 'user', 'region_id', 'region', 'id');
    }

    public function safeDown() {
        $this->dropTable('user_history');
        $this->dropTable('user_role');
        $this->dropTable('role_translation');
        $this->dropTable('role');
        $this->dropTable('user');
        $this->dropTable('region_translation');
        $this->dropTable('region');
        $this->dropTable('language');
    }

}
