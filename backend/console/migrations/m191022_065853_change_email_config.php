<?php

use console\components\Migration;

class m191022_065853_change_email_config extends Migration {

    public function safeUp() {
        $this->update('email_config', ['starttls' => 1], ['email' => 'sender@wildasoftware.pl']);
    }

    public function safeDown() {
        $this->update('email_config', ['starttls' => 0], ['email' => 'sender@wildasoftware.pl']);
    }
}
