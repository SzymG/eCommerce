<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%article_region}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%article}}`
 * - `{{%region}}`
 */
class m190820_065508_create_junction_table_for_article_and_region_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%article_region}}', [
            'article_id' => $this->integer(),
            'region_id' => $this->integer(),
            'PRIMARY KEY(article_id, region_id)',
        ]);

        // creates index for column `article_id`
        $this->createIndex(
            '{{%idx-article_region-article_id}}',
            '{{%article_region}}',
            'article_id'
        );

        // add foreign key for table `{{%article}}`
        $this->addForeignKey(
            '{{%fk-article_region-article_id}}',
            '{{%article_region}}',
            'article_id',
            '{{%article}}',
            'id',
            'CASCADE'
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-article_region-region_id}}',
            '{{%article_region}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-article_region-region_id}}',
            '{{%article_region}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%article}}`
        $this->dropForeignKey(
            '{{%fk-article_region-article_id}}',
            '{{%article_region}}'
        );

        // drops index for column `article_id`
        $this->dropIndex(
            '{{%idx-article_region-article_id}}',
            '{{%article_region}}'
        );

        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-article_region-region_id}}',
            '{{%article_region}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-article_region-region_id}}',
            '{{%article_region}}'
        );

        $this->dropTable('{{%article_region}}');
    }
}
