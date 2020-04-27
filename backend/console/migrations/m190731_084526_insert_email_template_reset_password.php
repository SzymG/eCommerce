<?php

use console\components\Migration;
use yii\db\Query;

class m190731_084526_insert_email_template_reset_password extends Migration {

    public function safeUp() {
        $this->insert('email_type', [
            'symbol' => 'email_reset_password',
            'tags' => '{code},{email},{imgsrc}',
            'is_archived' => false,
            'is_active' => true
        ]);

        $typeId = $this->db->getLastInsertID();
        $languageId = (new Query)->select('id')->from('language')->where(['symbol' => 'pl']);
        $content = file_get_contents(Yii::getAlias('@console/mail/pl/resetPassword.html'));

        $this->insert('email_template', [
            'email_type_id' => $typeId,
            'language_id' => $languageId,
            'subject' => 'Zmiana hasła',
            'content_html' => $content,
            'content_text' => strip_tags($content)
        ]);

        $languageId = (new Query)->select('id')->from('language')->where(['symbol' => 'en']);
        $content = file_get_contents(Yii::getAlias('@console/mail/en/resetPassword.html'));

        $this->insert('email_template', [
            'email_type_id' => $typeId,
            'language_id' => $languageId,
            'subject' => 'Reset password',
            'content_html' => $content,
            'content_text' => strip_tags($content)
        ]);

        $this->createTable('user_token', [
            'id' => $this->primaryKey(11),
            'user_id' => $this->integer(11),
            'reset_token' => $this->string(64),
            'attempts' => $this->integer(11)
        ]);

        $this->addForeignKey('fk_user_token_user', 'user_token', 'user_id', 'user', 'id');
    }

    public function safeDown() {
        $typeId = (new Query)->select('id')->from('email_type')->where(['symbol' => 'email_reset_password']);
        $this->delete('email_template', ['email_type_id' => $typeId]);
        $this->delete('email_type', ['id' => $typeId]);
        $this->dropTable('user_token');
    }
}
