<?php
use console\components\Migration;

/**
 * Handles the creation of table `{{%event_translation}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%event}}`
 * - `{{%language}}`
 */
class m190711_100603_create_junction_table_for_event_and_language_tables extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%event_translation}}', [
            'event_id'    => $this->integer(),
            'language_id' => $this->integer(),
            'title'       => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'PRIMARY KEY(event_id, language_id)',
        ]);

        $this->createIndex(
            '{{%idx-event_translation-event_id}}',
            '{{%event_translation}}',
            'event_id'
        );

        $this->addForeignKey(
            '{{%fk-event_translation-event_id}}',
            '{{%event_translation}}',
            'event_id',
            '{{%event}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-event_translation-language_id}}',
            '{{%event_translation}}',
            'language_id'
        );

        $this->addForeignKey(
            '{{%fk-event_translation-language_id}}',
            '{{%event_translation}}',
            'language_id',
            '{{%language}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey(
            '{{%fk-event_translation-event_id}}',
            '{{%event_translation}}'
        );

        $this->dropIndex(
            '{{%idx-event_translation-event_id}}',
            '{{%event_translation}}'
        );

        $this->dropForeignKey(
            '{{%fk-event_translation-language_id}}',
            '{{%event_translation}}'
        );

        $this->dropIndex(
            '{{%idx-event_translation-language_id}}',
            '{{%event_translation}}'
        );

        $this->dropTable('{{%event_translation}}');
    }
}
