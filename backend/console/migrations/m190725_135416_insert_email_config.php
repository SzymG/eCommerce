<?php

use console\components\Migration;

class m190725_135416_insert_email_config extends Migration {

    public function safeUp() {
        $this->insert('email_config', [
    		'id' => 1,
    		'email' => 'sender@wildasoftware.pl',
    		'password' => 'Sender2019*',
    		'port' => 465,
    		'protocol' => 'smtp',
    		'host' => 'serwer1809378.home.pl',
    		'starttls' => false,
    		'smtp_auth' => true,
    		'noreply_email' => 'noreply@wildasoftware.pl'
    	]);
    }

    public function safeDown() {
        $this->delete('email_config');
    }
}
