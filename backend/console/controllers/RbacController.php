<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
use common\models\ar\User;
use common\models\types\RoleType;

class RbacController extends Controller {
    
    private $roles = [];
    
    public function actionInit() {
        $this->initializeRbac();
    }
    
    public function actionUpdate() {
        $auth = Yii::$app->authManager;
        $auth->removeAll();
        $this->initializeRbac();
        $this->recalculateRoles();
    }
    
    public function assignRoleToUser($roleSymbol, $userId) {
        $auth = Yii::$app->authManager;
        $auth->assign($this->getRole($roleSymbol, $auth), $userId);
    }
    
    public function revokeRoleFromUser($roleSymbol, $userId) {
        $auth = Yii::$app->authManager;
        $auth->revoke($this->getRole($roleSymbol, $auth), $userId);
    }
    
    private function initializeRbac() {
        $authManager = Yii::$app->authManager;
        
        $admin = $this->addRoleToAuthManager($authManager, RoleType::ADMIN);
        $graduate = $this->addRoleToAuthManager($authManager, RoleType::GRADUATE);
        $ambassador = $this->addRoleToAuthManager($authManager, RoleType::AMBASSADOR);
        $this->addPermissionToAuthManager($authManager, RoleType::ADMIN, $admin);
        $this->addPermissionToAuthManager($authManager, RoleType::GRADUATE, $graduate);
        $this->addPermissionToAuthManager($authManager, RoleType::AMBASSADOR, $ambassador);
    }
    
    private function addRoleToAuthManager($authManager, $key) {
        $role = $authManager->createRole($key.'_role');
        $authManager->add($role);
        return $role;
    }
    
    private function addPermissionToAuthManager($authManager, $key, $role) {
        $permission = $authManager->createPermission($key);
        $authManager->add($permission);
        $authManager->addChild($role, $permission);
    }
    
    private function recalculateRoles() {
        $users = User::find()->all();
        
        if(!empty($users)) {
            $auth = Yii::$app->authManager;
        
            foreach($users as $u) {
                foreach($u->getRoles()->all() as $r) {
                    $auth->assign($this->getRole($r->symbol, $auth), $u->id);
                }
            }
        }
    }
    
    private function getRole($symbol, &$auth) {
        if(empty($this->roles[$symbol])) {
            $this->roles[$symbol] = $auth->getRole($symbol.'_role');
        }
        
        return $this->roles[$symbol];
    }
}
