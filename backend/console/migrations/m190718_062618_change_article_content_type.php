<?php

use console\components\Migration;

class m190718_062618_change_article_content_type extends Migration {

    public function safeUp() {
		$this->alterColumn('article', 'content', 'LONGTEXT');
	}

	public function safeDown() {
		$this->alterColumn('article', 'content', 'VARCHAR(1024)' );
	}
}
