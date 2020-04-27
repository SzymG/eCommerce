<?php

use console\components\Migration;

class m191029_131142_insert_role_translations extends Migration {

    public function safeUp() {

        $translations = [
            "admin" => [ "pl" => "Administrator", "en" => "Admin" ],
            "graduate" => [ "pl" => "Absolwent", "en" => "Graduate" ],
            "ambassador" => [ "pl" => "Ambasador", "en" => "Ambassador" ],
        ];

        $roles = \common\models\ar\Role::find()->all();
        $languages = \common\models\ar\Language::find()->all();
        foreach ($roles as $role){
            foreach ($languages as $language){
                $roleTranslation = \common\models\ar\RoleTranslation::findOne(['role_id' => $role->id, 'language_id' => $language]);
                if(!$roleTranslation){
                    $this->insert('role_translation', [
                        'role_id' => $role->id,
                        'language_id' => $language->id,
                        'name' => $translations[$role->symbol][$language->symbol],
                    ]);
                }
            }
        }
    }

    public function safeDown() {
        
    }
}
