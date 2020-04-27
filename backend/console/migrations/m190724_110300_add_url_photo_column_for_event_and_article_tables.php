<?php

use console\components\Migration;

class m190724_110300_add_url_photo_column_for_event_and_article_tables extends Migration {

    public function safeUp() {
        $this->addColumn('event', 'url_header_photo', $this->string());
        $this->addColumn('article', 'url_header_photo', $this->string());
    }

    public function safeDown() {
        $this->dropColumn('article', 'url_header_photo');
        $this->dropColumn('event', 'url_header_photo');
    }
}
