<?php

use console\components\Migration;
use yii\db\Query;

class m190820_065741_insert_article_status_and_article_status_translation extends Migration {
    private $statuses = ['new', 'accepted', 'rejected'];
    public function safeUp() {
        foreach($this->statuses as $status) {
            $this->insert('article_status', [
                'symbol' => $status
            ]);

            $statusId = $this->db->getLastInsertID();
            $languageId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);
            $this->insert('article_status_translation', [
                'article_status_id' => $statusId,
                'language_id' => $languageId,
                'name' => Yii::t('app', $status),
            ]);
        }
    }

    public function safeDown() {
        foreach($this->statuses as $status) {
            $statusId = (new Query)->select('id')->from('article_status')->where(['symbol' => $status]);
            $this->delete('article_status_translation', ['article_status_id' => $statusId]);
            $this->delete('article_status', ['id' => $statusId]);
        }
    }
}
