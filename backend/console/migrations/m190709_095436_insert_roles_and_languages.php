<?php

use console\components\Migration;

class m190709_095436_insert_roles_and_languages extends Migration {

    public function safeUp() {
        $this->insert('language', [
            'symbol' => 'pl',
            'name' => 'Polski',
        ]);
        $languageId = $this->db->getLastInsertID();

        $this->insert('role', ['symbol' => 'admin']);
        $adminRoleId = $this->db->getLastInsertID();
        $this->insert('role_translation', [
            'role_id' => $this->db->getLastInsertID(), 
            'language_id' => $languageId, 
            'name' => 'Administrator',
        ]);

        $this->insert('role', ['symbol' => 'graduate']);
        $this->insert('role_translation', [
            'role_id' => $this->db->getLastInsertID(), 
            'language_id' => $languageId, 
            'name' => 'Absolwent',
        ]);

        $this->insert('role', ['symbol' => 'ambassador']);
        $this->insert('role_translation', [
            'role_id' => $this->db->getLastInsertID(), 
            'language_id' => $languageId, 
            'name' => 'Ambasador',
        ]);

        $this->insert('region', ['symbol' => 'pl']);
        $regionId = $this->db->getLastInsertID();
        $this->insert('region_translation', [
            'region_id' => $this->db->getLastInsertID(), 
            'language_id' => $languageId, 
            'name' => 'Polska',
        ]);

        $this->insert('user', [
            'email' => 'admin@absolwenci.com',
            'first_name' => 'Administrator',
            'last_name' => 'Systemu',
            'password' => Yii::$app->security->generatePasswordHash('1qazxsw2', 12),
            'career' => 'Administrator',
            'region_id' => $regionId
        ]);
        $userId = $this->db->getLastInsertID();
        
        $this->insert('user_role', [
            'user_id' => $userId,
            'role_id' => $adminRoleId,
        ]);
    }

    public function safeDown() {
        $this->delete('user_role');
        $this->delete('user');
        $this->delete('region_translation');
        $this->delete('region');
        $this->delete('role_translation');
        $this->delete('role');
        $this->delete('language');
    }
}
