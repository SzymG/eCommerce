<?php

use console\components\Migration;

class m190711_100853_create_tables_connected_with_article extends Migration {

    public function safeUp() {
		$this->createTable('article_status', [
            'id' => $this->primaryKey(11),
            'symbol' => $this->string(32),
        ]);
		
		$this->createTable('article_status_translation', [
            'article_status_id' => $this->integer(11)->notNull(),
            'language_id' => $this->integer(11)->notNull(),
            'name' => $this->string(128)->notNull(),
        ]);
		
		$this->addPrimaryKey('pk_article_status_translation', 'article_status_translation', ['article_status_id', 'language_id']);
        $this->addForeignKey('fk_article_status_translation_article_status', 'article_status_translation', 'article_status_id', 'article_status', 'id');
        $this->addForeignKey('fk_article_status_translation_language', 'article_status_translation', 'language_id', 'language', 'id');
		
        $this->createTable('article', [
            'id' => $this->primaryKey(11),
			'title' => $this->string(128)->notNull()->defaultValue('Default title'),
			'content' => $this->string(1024)->null(),
			'author' => $this->integer(11)->notNull(),
			'date_publication' => $this->timestamp()->null(),
			'is_global' => $this->integer(1)->notNull()->defaultValue(1),
			'status_id' => $this->integer(11)->notNull(),
        ]);
		
        $this->addForeignKey('fk_article_user', 'article', 'author', 'user', 'id');
		$this->addForeignKey('fk_article_article_status', 'article', 'status_id', 'article_status', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
		$this->dropTable('article_status');
		$this->dropTable('article_status_translation');
        $this->dropTable('article');
    }
}
