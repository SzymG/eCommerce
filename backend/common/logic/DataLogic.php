<?php

namespace common\logic;

use common\helpers\DataHelper;
use Yii;

class DataLogic {

    private $userRepository;
    private $patientRepository;
    private $dataHelper;

    public function __construct() {
        $this->userRepository = new \frontend\modules\user\repositories\UserRepositorySql();
        $this->dataHelper = new DataHelper();
    }

    public function encryptUser($id) {
        $key = DataHelper::GUID();
        $userKeys = [
            'email', 'first_name', 'last_name', 'phone', 'description', 'career', 'birth_year', 'url_photo', 
            'is_public'
        ];
        $transaction = Yii::$app->db->beginTransaction();
        try {
            $user = $this->userRepository->getById($id);
            if(!$user['is_deleted']) {
                $this->userRepository->update(['id' => $id], [
                    'delete_key' => $key, 'is_deleted' => 1, 'is_active' => 0, 'region_id' => null,
                    'auth_token' => null, 'rank_id' => null, 'is_public' => 0, 'total_points' => 0,
                    'verification_code' => null
                ]);
                
                $user = $this->userRepository->getById($id);
                $toUpdate = $this->dataHelper->encryptArray($user, $key, $userKeys);
                $this->userRepository->update(['id' => $id], $toUpdate);
            }
            $transaction->commit();
        }
        catch(\Exception $e) {
            $transaction->rollBack();
            Yii::error($e->getMessage());
            Yii::error($e->getTraceAsString());
            throw new \Exception();
        }

        return $id;
    }
}