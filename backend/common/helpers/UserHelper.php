<?php
namespace common\helpers;

use Yii;
use common\models\ar\User;
use common\models\ar\UserRole;
use common\models\ar\UserPrize;
use common\models\ar\UserHistory;
use yii\helpers\Json;

class UserHelper {

    public static function makeSnapshot($userId) {
        $snapshot = [
            'fields' => User::findOne(['id' => $userId])->attributes,
            'user_role' => UserRole::findOne(['user_id' => $userId])->attributes,
        ];

        $snapshot['user_role'] = array_map(function($userRole) {
            return $userRole->attributes;
        }, UserRole::findAll(['user_id' => $userId]));

        $snapshot['user_prize'] = array_map(function($userPrize) {
            return $userPrize->attributes;
        }, UserPrize::findAll(['user_id' => $userId]));

        return $snapshot;
    }
    
    public static function createHistoryEntry($userSubjectId, $dataBefore, $dataAfter) {
        $userHistory = new UserHistory();

        $userHistory->user_subject_id = $userSubjectId;
        $userHistory->user_id = Yii::$app->params['currentUserId'] ?? $userSubjectId;
        $userHistory->data_before = !empty($dataBefore) ? Json::encode($dataBefore) : null;
        $userHistory->data_after = !empty($dataAfter) ? Json::encode($dataAfter) : null;

        $userHistory->save();
    }
}