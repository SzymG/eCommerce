<?php
namespace common\helpers;

use Yii;

class StringHelper extends \yii\helpers\StringHelper {
    
    public function toSnakeCase(string $text) {
        $output = $text;
        
        if(!empty($text)) {
            for($i = 0; $i < strlen($text); ++$i) {
                $char = substr($text, $i, 1);
                if(ctype_upper($char)) {
                    $output = str_replace($char, '_'.strtolower($char), $output);
                }
            }
        }
        
        return $output;
    }
    
    public function generateRandomString(int $length, string $salt = '') {
        $part = '';
        if(!empty($salt)) {
            $part = md5($salt);
            if($length <= 32) {
                $part = substr($part, 0, $length / 2);
            }
        }
        
        return $part.Yii::$app->security->generateRandomString($length - strlen($part));
    }
    
    public function removeWhiteChars(string $text) {
        return trim(preg_replace('/\s+/', ' ', $text));
    }

    public function camel2dashed(string $text) {
        return strtolower(preg_replace('/([A-Z])/', '-$1', $text));
    }

    public function dashed2camel(string $text) {
        return str_replace('-', '', lcfirst(ucwords($text, '-')));
    }

    public static function TruncateText($text, $max_len) {
        $len = mb_strlen($text, 'UTF-8');

        if ($len <= $max_len) {
            return $text;
        } else {
            return mb_substr($text, 0, $max_len - 1, 'UTF-8') . '...';
        }
    }
}