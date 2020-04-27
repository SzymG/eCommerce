<?php
use console\components\Migration;

/**
 * Handles the creation of table `{{%event_user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%event}}`
 * - `{{%user}}`
 */
class m190711_101624_create_junction_table_for_event_and_user_tables extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%event_user}}', [
            'event_id' => $this->integer(),
             'user_id' => $this->integer(),
            'is_confirmed' => $this->boolean()->notNull(),
            'PRIMARY KEY(event_id, user_id)',
        ]);

        $this->createIndex(
            '{{%idx-event_user-event_id}}',
            '{{%event_user}}',
            'event_id'
        );

        $this->addForeignKey(
            '{{%fk-event_user-event_id}}',
            '{{%event_user}}',
            'event_id',
            '{{%event}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-event_user-user_id}}',
            '{{%event_user}}',
            'user_id'
        );

        $this->addForeignKey(
            '{{%fk-event_user-user_id}}',
            '{{%event_user}}',
            'user_id',
            '{{%user}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey(
            '{{%fk-event_user-event_id}}',
            '{{%event_user}}'
        );

        $this->dropIndex(
            '{{%idx-event_user-event_id}}',
            '{{%event_user}}'
        );

        $this->dropForeignKey(
            '{{%fk-event_user-user_id}}',
            '{{%event_user}}'
        );

        $this->dropIndex(
            '{{%idx-event_user-user_id}}',
            '{{%event_user}}'
        );

        $this->dropTable('{{%event_user}}');
    }
}
