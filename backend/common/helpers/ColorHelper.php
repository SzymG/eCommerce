<?php
namespace common\helpers;

use Yii;

class ColorHelper {
    
    public function getDifferingSet() {
        return [
            ['background' => '#007bff', 'text' => '#ffffff'],
            ['background' => '#28a745', 'text' => '#ffffff'],
            ['background' => '#dc3545', 'text' => '#ffffff'],
            ['background' => '#ffc107', 'text' => '#343a40'],
            ['background' => '#6c757d', 'text' => '#ffffff'],
            ['background' => '#17a2b8', 'text' => '#ffffff'],
            ['background' => '#f8f9fa', 'text' => '#343a40'],
            ['background' => '#343a40', 'text' => '#ffffff'],
            ['background' => '#7e4084', 'text' => '#ffffff'],
            ['background' => '#282e98', 'text' => '#ffffff'],
            ['background' => '#4e9828', 'text' => '#ffffff'],
            ['background' => '#ae3715', 'text' => '#ffffff'],
        ];
    }
}