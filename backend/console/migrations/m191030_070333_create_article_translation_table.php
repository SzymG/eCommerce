<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_translation`.
 */
class m191030_070333_create_article_translation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('article_translation', [
            'article_id'    => $this->integer(),
            'language_id' => $this->integer(),
            'title'       => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'PRIMARY KEY(article_id, language_id)',
        ]);

        $this->createIndex(
            'idx-article_translation-article_id',
            'article_translation',
            'article_id'
        );

        $this->addForeignKey(
            'fk-article_translation-article_id',
            'article_translation',
            'article_id',
            'article',
            'id'
        );

        $this->createIndex(
            'idx-article_translation-language_id',
            'article_translation',
            'language_id'
        );

        $this->addForeignKey(
            'fk-article_translation-language_id',
            'article_translation',
            'language_id',
            'language',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-article_translation-article_id',
            'article_translation'
        );

        $this->dropIndex(
            'idx-article_translation-article_id',
            'article_translation'
        );

        $this->dropForeignKey(
            'fk-article_translation-language_id',
            'article_translation'
        );

        $this->dropIndex(
            'idx-article_translation-language_id',
            'article_translation'
        );

        $this->dropTable('article_translation');
    }
}
