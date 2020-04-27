<?php

namespace frontend\components;

use Yii;

/**
 * @inheritdoc
 */
class ModuleController extends \frontend\components\Controller {	
	
	public function runAction($id, $params = []) {
        if(isset($params['name']) && empty($id)) {
            $id = $params['name'];
            unset($params['name']);
        }

        return parent::runAction($id, $params);
    }
}
