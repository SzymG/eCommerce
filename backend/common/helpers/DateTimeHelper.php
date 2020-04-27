<?php
namespace common\helpers;

use Yii;

class DateTimeHelper {
    
    public function normalizeDate($text) {
        return Yii::$app->formatter->asDate($text, 'yyyy-MM-dd');
    }
    
    public function formatDate(\DateTime $dateTime) {
        return $dateTime->format('d.m.Y');
    }
    
    public function formatTime(\DateTime $dateTime, bool $withSeconds = false) {
        return $withSeconds ? $this->formatTimeWithSeconds($dateTime) : $this->formatTimeWithoutSeconds($dateTime);
    }
    
    private function formatTimeWithoutSeconds(\DateTime $dateTime) {
        return $dateTime->format('H:i');
    }
    
    private function formatTimeWithSeconds(\DateTime $dateTime) {
        return $dateTime->format('H:i:s');
    }

    public function formatDayOfWeek(\DateTime $dateTime) {
        return mb_strtolower(Yii::t('app', mb_strtolower(strftime('%A', $dateTime->getTimestamp()), 'utf-8')), 'utf-8');
    }
}
