<?php

use console\components\Migration;

class m190725_134651_create_email_tables extends Migration {

    public function safeUp() {
		$tableOptions = null;
		if($this->db->driverName === 'mysql') {
			$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
		}

        $this->createEmailConfig($tableOptions);
        $this->createEmailType($tableOptions);
        $this->createEmailTemplate($tableOptions);
    }

    public function safeDown() {
        $this->dropTable('email_template');
    	$this->dropTable('email_type');
    	$this->dropTable('email_config');
    }

    private function createEmailConfig($tableOptions) {
		$this->createTable('email_config', [
				'id' => $this->primaryKey(11),
				'email' => $this->string(64)->notNull(),
				'password' => $this->string(32)->notNull(),
				'port' => $this->integer(5)->notNull(),
				'protocol' => $this->string(32)->notNull(),
				'host' => $this->string(64)->notNull(),
				'starttls' => $this->boolean()->notNull()->defaultValue(0),
				'smtp_auth' => $this->boolean()->notNull()->defaultValue(1),
				'noreply_email' => $this->string(64),
				'from' => $this->string(64)
		], $tableOptions);

		$this->createIndex('uk_email_config_email_host', 'email_config', array('email', 'host'), true);
    }
    
    private function createEmailType($tableOptions) {
		$this->createTable('email_type', [
				'id' => $this->primaryKey(11),
				'symbol' => $this->string(32)->notNull()->unique(),
				'tags' => $this->string(128)->defaultValue(null),
				'is_archived' => $this->boolean()->notNull()->defaultValue(0),
				'is_active' => $this->boolean()->notNull()
		], $tableOptions);
    }
    
    private function createEmailTemplate($tableOptions) {
		$this->createTable('email_template', [
				'email_type_id' => $this->integer(11),
				'language_id' => $this->integer(11),
				'subject' => $this->string(256)->notNull(),
				'content_html' => $this->text(),
				'content_text' => $this->text()
		], $tableOptions);

		$this->addPrimaryKey('pk_email_template', 'email_template', array('email_type_id', 'language_id'));
		$this->addForeignKey('fk_email_template_language', 'email_template', 'language_id', 'language', 'id');
		$this->addForeignKey('fk_email_template_email_type', 'email_template', 'email_type_id', 'email_type', 'id');

		$this->alterColumn('email_template', 'content_html', 'mediumtext NOT NULL');
    }
}
