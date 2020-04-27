<?php

namespace common\models\ar;

use Yii;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $password
 * @property string $email
 * @property string $facebook_url
 * @property string $first_name
 * @property string $last_name
 * @property string $description
 * @property string $career
 * @property string $birth_year
 * @property string $url_photo
 * @property integer $is_public
 * @property integer $is_fb_public
 * @property integer $is_success_story_public
 * @property integer $region_id
 * @property integer $is_active
 * @property integer $is_deleted
 * @property string $date_creation
 * @property string $auth_token
 * @property integer $verification_code
 * @property integer $total_points
 * @property integer $rank_id
 *
 * @property Region $region
 * @property UserAction[] $userActions
 * @property UserRole[] $userRoles
 * @property Rank $rank
 */


class User extends \yii\db\ActiveRecord implements IdentityInterface {

    public $roleArray = [];

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
			[['email'], 'required'],
			[['description'], 'string'],
			[['is_public', 'is_fb_public', 'is_success_story_public', 'is_fate_accepted', 'region_id', 'is_active', 'is_deleted', 'verification_code', 'total_points', 'rank_id'], 'integer'],
			[['date_creation', 'roleArray'], 'safe'],
			[['password', 'career', 'url_photo'], 'string', 'max' => 256],
			[['email', 'facebook_url', 'first_name', 'last_name'], 'string', 'max' => 128],
			[['birth_year'], 'string', 'max' => 32],
			[['auth_token'], 'string', 'max' => 512],
			[['email'], 'unique'],
			[['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::className(), 'targetAttribute' => ['region_id' => 'id']]
		];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'id'),
            'password' => Yii::t('app', 'password'),
            'email' => Yii::t('app', 'email'),
            'first_name' => Yii::t('app', 'firstName'),
            'last_name' => Yii::t('app', 'lastName'),
            'description' => Yii::t('app', 'description'),
            'career' => Yii::t('app', 'career'),
            'birth_year' => Yii::t('app', 'birthYear'),
            'url_photo' => Yii::t('app', 'urlPhoto'),
            'is_public' => Yii::t('app', 'isPublic'),
            'is_fb_public' => Yii::t('app', 'isFbPublic'),
            'is_success_story_public' => Yii::t('app', 'isSuccessStoryPublic'),
            'is_fate_accepted' => Yii::t('app', 'isFateAccepted'),
            'region_id' => Yii::t('app', 'regionId'),
            'is_active' => Yii::t('app', 'isActive'),
            'is_deleted' => Yii::t('app', 'isDeleted'),
            'date_creation' => Yii::t('app', 'dateCreation'),
            'auth_token' => Yii::t('app', 'authToken'),
            'verification_code' => Yii::t('app', 'verificationCode'),
            'total_points' => Yii::t('app', 'totalPoints'),
            'rank_id' => Yii::t('app', 'rankId'),
            'rolesName' => Yii::t('app', 'rolesName'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegion() {
        return $this->hasOne(Region::className(), ['id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserActions() {
        return $this->hasMany(UserAction::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRoles() {
        return $this->hasMany(UserRole::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoles() {
        return $this->hasMany(Role::className(), ['id' => 'role_id'])->viaTable('user_role', ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRank() {
        return $this->hasOne(Rank::className(), ['id' => 'rank_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\aq\UserQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\aq\UserQuery(get_called_class());
    }


    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */

    public static function findIdentity($id) {

        return static::findOne($id);
    }

    public function getAuthToken() {

        return $this->auth_token;

    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        return static::findOne(['id' => $token->getClaim('uid')]);
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled. The returned key will be stored on the
     * client side as a cookie and will be used to authenticate user even if PHP session has been expired.
     *
     * Make sure to invalidate earlier issued authKeys when you implement force user logout, password change and
     * other scenarios, that require forceful access revocation for old sessions.
     *
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey() {
        return null;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public static function findByEmail($email) {
        return static::findOne(['email' => $email]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password) {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public static function discoverNameForm($obj) {
        if(!empty($obj)) {
            return (!empty($obj->first_name) && !empty($obj->last_name) ? "{$obj->first_name} {$obj->last_name}" :
                    $obj->email ?: $obj->id);
        }
        else {
            return null;
        }
    }

    public function getRolesName() {
        $roles = '';
        foreach($this->roles as $role) {
            $roles .= $role->getName().'; ';
        }
        return $roles;
    }

    public function getRolesArray() {
        return ArrayHelper::map(Role::find()
                                ->all(), 'id', function($item) {
                                    return $item->getName();
                                });
    }
    
    public function getUserRolesArray() {
        return ArrayHelper::getColumn($this->getRoles()->select(['id'])->asArray()->all(), 'id');
    }

    public function save($runValidation = true, $attributeNames = null) {
        return parent::save($runValidation, $attributeNames);
    }
    
    public function saveRoles($userId) {
        $transaction = Yii::$app->db->beginTransaction();
        try {
            UserRole::deleteAll(['user_id' => $this->id]);
            foreach($this->roleArray as $roleId) {
               $userRole = new UserRole();
               $userRole->user_id = $userId;
               $userRole->role_id = $roleId;
               $userRole->insert();
            }
            $transaction->commit();
            return true;  
        } catch (Exception $e) {
            $transaction->rollBack();
            return false;
        }
 
    }
}
