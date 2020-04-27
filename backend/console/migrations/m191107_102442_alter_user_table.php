<?php

use console\components\Migration;

class m191107_102442_alter_user_table extends Migration {

    public function safeUp() {
        $this->addColumn('user', 'is_fb_public', $this->boolean()->notNull()->defaultValue(false));
        $this->addColumn('user', 'is_success_story_public', $this->boolean()->notNull()->defaultValue(false));

    }

    public function safeDown() {
        $this->dropColumn('user', 'is_fb_public');
        $this->dropColumn('user', 'is_success_story_public');

    }
}
