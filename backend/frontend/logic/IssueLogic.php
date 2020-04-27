<?php

namespace frontend\logic;

use Yii;
use frontend\logic\mappers\IssueDataMapper;

class IssueLogic {

    private $issueRepository;

    public function __construct() {
        $this->issueRepository = new \frontend\repositories\IssueRepositorySql();
    }

    public function create(IssueDataMapper $mapper) {
        $fields = get_object_vars($mapper);
        return $this->issueRepository->insert($fields);
    }
}