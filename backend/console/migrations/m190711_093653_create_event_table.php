<?php
use console\components\Migration;

/**
 * Handles the creation of table `{{%event}}`.
 */
class m190711_093653_create_event_table extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%event}}', [
            'id'         => $this->primaryKey(),
            'date_start' => $this->timestamp()->notNull()->defaultValue(null),
            'date_end'   => $this->timestamp()->notNull()->defaultValue(null),
            'is_public'  => $this->boolean()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('{{%event}}');
    }
}
