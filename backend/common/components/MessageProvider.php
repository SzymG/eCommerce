<?php

namespace common\components;

use Yii;
use common\models\ar\EmailConfig;
use yii\helpers\Json;

class MessageProvider {

	const MODE_PHONE = 1;
	const MODE_EMAIL = 2;
	const MODE_ALL = 3;

	public function send($email, $smsSymbol, $emailSymbol, $mode = null, $smsOptions = [], $emailOptions = [], $withAlert = true, $attachments = [], $secondEmail = null) {
		$mode = $mode ?: self::MODE_ALL;
		$sent = false;

        if (!empty($email) && in_array($mode, [self::MODE_EMAIL, self::MODE_ALL])) {
            $sent = $this->sendMessage($email, $emailSymbol, $emailOptions, $withAlert, $attachments);
			if($sent && !empty($secondEmail)) {
				$sent = $this->sendMessage($secondEmail, $emailSymbol, $emailOptions, $withAlert, $attachments);
			}
        }
        else {
            Yii::warning('Empty email or invalid mode. Mode: ' . Json::encode($mode));
        }
		return $sent;
	}

	private function sendMessage($email, $emailSymbol, $emailOptions, $withAlert, $attachments) {
		$sent = false;
		$controller = Yii::$app->controller;
		$status = $controller->sendEmailMessage($email, $emailSymbol, $emailOptions, $withAlert, $attachments);
		$sent = $status === EmailHelper::STATUS_OK || $sent;

		if ($status !== EmailHelper::STATUS_OK) {
			Yii::warning('Failed to send an email. Status: ' . Json::encode($status));
		}
		return $sent;
	}

	public function sendStaticEmail($from, $fromName, $to, $subject, $body, $textMode = true, $emailConfigId = null, $attachments = null) {
		$config = EmailConfig::findOne($emailConfigId);

		ini_set('max_execution_time', 120);
		if(empty($config)) {
			return false;
		}

		/* @var yii\swiftmailer\Mailer $mailer */
		$mailer = Yii::$app->mailer;

		$transport = (new \Swift_SmtpTransport($config->host, $config->port, $config->starttls ? 'ssl' : null))
				->setUsername($config->email)
				->setPassword($config->password);

		$mailer->setTransport($transport);

		$message = $mailer->compose()
				->setFrom([$config->email => $config->from])
				->setTo([ $to ])
				->setReplyTo([$from => $fromName])
				->setSubject($subject);

		if($textMode) {
			$message->setTextBody($body);
		}
		else {
			$message->setHtmlBody($body);
			$message->setTextBody('Twój klient pocztowy ma wyłączoną możliwość wyświetlania wiadomości w trybie HTML lub jej nie obsługuje. Prosimy włączyć tryb HTML lub zmienić klienta na obsługującego ten tryb.');
		}

		if (!empty($attachments)) {
			foreach ($attachments as $path => $options) {
				$message->attach($path, $options);
			}
		}

		if(isset(Yii::$app->params['archiveEmail'])) {
			$message->setBcc(Yii::$app->params['archiveEmail']);
		}

		return $message->send();
	}

}
?>
