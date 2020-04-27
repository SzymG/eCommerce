<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\ar\User;

/**
 * Login form
 */
class LoginForm extends Model {
    
    public $email;
    public $password;
    public $ipAddress;

    private $_user;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            ['email', 'required', 'message' => Yii::t('app', 'emailRequired')],
            ['password', 'required', 'message' => Yii::t('app', 'passwordRequired')],
            ['password', 'validatePassword'],
            ['ipAddress', 'ip'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if(!$this->hasErrors()) {
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'incorrectAuthorizationData'));
            }
            
            else if(empty($user->is_active)) {
                $this->addError($attribute, Yii::t('app', 'notVerifiedAccount'));
            }

            else {
                $roles = array_map(function($userRole) {
                    return $userRole->role->symbol;
                }, $user->userRoles);
                
                if(!in_array('admin', $roles)) {
                    $this->addError($attribute, Yii::t('app', 'notAdmin'));
                }
            }

        }
    }

    public function attributeLabels() {
        return [
            'email' => Yii::t('app', 'email'),
            'password' => Yii::t('app', 'password'),
            'ipAddress' => Yii::t('app', 'ipAddress'),
        ];
    }
    
    public function findErrors() {
        $this->validate();
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login() {
        if($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {
        if($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }

        return $this->_user;
    }

    public function getUserId() {
        return !empty($this->_user) ? $this->_user->id : null;
    }
}
