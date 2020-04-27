<?php

namespace frontend\repositories;

use Yii;
use yii\db\Query;
use frontend\components\RepositorySql;

class IssueRepositorySql extends RepositorySql {

    public function __construct() {
        parent::__construct();
    
        $this->tableName = 'issue';
    }
}