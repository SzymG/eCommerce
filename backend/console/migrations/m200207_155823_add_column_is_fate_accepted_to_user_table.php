<?php

use console\components\Migration;
use yii\db\Query;

class m200207_155823_add_column_is_fate_accepted_to_user_table extends Migration {

    public function safeUp() {
        $this->addColumn('user', 'is_fate_accepted', $this->boolean()->notNull()->defaultValue(false));
    }

    public function safeDown() {
        $this->dropColumn('user', 'is_fate_accepted');
    }
}
