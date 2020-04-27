<?php
use console\components\Migration;

/**
 * Handles the creation of table `{{%event_region}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%event}}`
 * - `{{%region}}`
 */
class m190711_101224_create_junction_table_for_event_and_region_tables extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        $this->createTable('{{%event_region}}', [
             'event_id' => $this->integer(),
            'region_id' => $this->integer(),
            'PRIMARY KEY(event_id, region_id)',
        ]);

        $this->createIndex(
            '{{%idx-event_region-event_id}}',
            '{{%event_region}}',
            'event_id'
        );

        $this->addForeignKey(
            '{{%fk-event_region-event_id}}',
            '{{%event_region}}',
            'event_id',
            '{{%event}}',
            'id'
        );

        $this->createIndex(
            '{{%idx-event_region-region_id}}',
            '{{%event_region}}',
            'region_id'
        );

        $this->addForeignKey(
            '{{%fk-event_region-region_id}}',
            '{{%event_region}}',
            'region_id',
            '{{%region}}',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropForeignKey(
            '{{%fk-event_region-event_id}}',
            '{{%event_region}}'
        );

        $this->dropIndex(
            '{{%idx-event_region-event_id}}',
            '{{%event_region}}'
        );

        $this->dropForeignKey(
            '{{%fk-event_region-region_id}}',
            '{{%event_region}}'
        );

        $this->dropIndex(
            '{{%idx-event_region-region_id}}',
            '{{%event_region}}'
        );

        $this->dropTable('{{%event_region}}');
    }
}
