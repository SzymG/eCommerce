<?php

use console\components\Migration;

/**
 * Handles adding author to table `{{%event}}`.
 */
class m190723_132310_add_author_column_to_event_table extends Migration {
    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->addColumn('event', 'author', $this->integer(11)->notNull()->after('date_publication'));
        $this->update('event', ['author' => 1]);
        $this->addForeignKey('fk_event_user', 'event', 'author', 'user', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey('fk_event_user', 'event');
        $this->dropColumn('event', 'author');
    }
}
