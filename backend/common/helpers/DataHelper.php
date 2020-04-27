<?php
namespace common\helpers;

use Yii;

class DataHelper {
    public function encryptData($dataToEncrypt, $key) {
        $cipher_method = 'AES-128-CTR';
        $enc_key = openssl_digest($key, 'SHA256', TRUE);
        $enc_iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cipher_method));
        $crypted_token = openssl_encrypt($dataToEncrypt, $cipher_method, $enc_key, 0, $enc_iv) . "::" . bin2hex($enc_iv);

        return $crypted_token;
    }

    public function decryptData($encryptedData, $key) {
        list($encryptedData, $enc_iv) = explode("::", $encryptedData);
        $cipher_method = 'AES-128-CTR';
        $enc_key = openssl_digest($key, 'SHA256', TRUE);
        $decryptedData = openssl_decrypt($encryptedData, $cipher_method, $enc_key, 0, hex2bin($enc_iv));

        return $decryptedData;
    }

    public function encryptArray($arr, $key, $keys) {
        $response = [];
        array_map(function(string $_key, $el) use($key, $keys, &$response) {
            if(in_array($_key, $keys)) {
                $response[$_key] = strpos($_key, 'is_') !== false ? 0 : (strpos($_key, 'date') !== false ? (new \DateTime())->setTimestamp(0)->format("Y-m-d H:i:s") : $this->encryptData($el, $key));
            }
        }, array_keys($arr), $arr);
        return $response;
    }

    public static function GUID()
    {
        if (function_exists('com_create_guid') === true)
        {
            return trim(com_create_guid(), '{}');
        }

        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

}