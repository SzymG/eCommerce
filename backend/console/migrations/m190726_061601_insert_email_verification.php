<?php

use console\components\Migration;
use yii\db\Query;

class m190726_061601_insert_email_verification extends Migration {

    public function safeUp() {
        $this->insert('language', [
            'symbol' => 'en',
            'name' => 'English'
        ]);

        $this->insert('email_type', [
            'symbol' => 'email_verification',
            'tags' => '{code},{email},{imgsrc}',
            'is_archived' => false,
            'is_active' => true
        ]);

        $typeId = $this->db->getLastInsertID();
        $languageId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);
        $content = file_get_contents(Yii::getAlias('@console/mail/pl/confirmation.html'));

        $this->insert('email_template', [
            'email_type_id' => $typeId,
            'language_id' => $languageId,
            'subject' => 'Potwierdzenie rejestracji',
            'content_html' => $content,
            'content_text' => strip_tags($content)
        ]);

        $languageId = (new Query)->select('id')->from('language')->where(['symbol' => 'en']);
        $content = file_get_contents(Yii::getAlias('@console/mail/en/confirmation.html'));

        $this->insert('email_template', [
            'email_type_id' => $typeId,
            'language_id' => $languageId,
            'subject' => 'Confirm registration',
            'content_html' => $content,
            'content_text' => strip_tags($content)
        ]);
    }

    public function safeDown() {
        $this->delete('email_template');
        $this->delete('email_type');
        $this->delete('language', ['symbol' => 'en']);
    }
}
