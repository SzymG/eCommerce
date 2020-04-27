<?php 
namespace common\components;

use Yii;
use common\models\ar\EmailConfig;
use common\models\aq\EmailConfigQuery;

class EmailHelper extends MessageHelper {
	
	/**
	 * @param array $params
	 * @return string
	 */
	public function send($params) {
		extract($params);
		
		if(!$type->is_active) {
			return $this->status = self::STATUS_DISABLED;
		}
		
		$config = EmailConfigQuery::getDefaultEmailConfig();
		
		try {
			/* @var yii\swiftmailer\Mailer $mailer */
			$mailer = Yii::$app->mailer;

			$transport = (new \Swift_SmtpTransport($config->host, $config->port, $config->starttls ? 'ssl' : null))
					->setUsername($config->email)
					->setPassword($config->password);
			
			$mailer->setTransport($transport);
			
			$message = $mailer->compose()
					->setFrom([$config->email => $config->from])
					->setTo($email)
					->setSubject($subject ?: Yii::$app->name)
					->setHtmlBody($message)
					->setTextBody(isset($text) ? $text : Yii::t('app', 'Displaying messages in HTML mode is disabled in your e-mail client or cannot be handled. Please enable HTML mode or change a client which would be able to handle this mode.'));

            if (!empty($attachments)) {
                foreach ($attachments as $key => $attachment) {
                    $filename = is_string($key) ? $key : basename($attachment);
                    $message->attach($attachment, [
                        'fileName' => $filename,
                        'contentType' => 'application/pdf',
                    ]);
                }
            }

			if(isset($params['withCopies']) && !empty($params['withCopies']) && isset(Yii::$app->params['archiveEmail'])) {
				$message->setBcc(Yii::$app->params['archiveEmail']);
			}
			
			if(!empty($config->noreply_email)) {
				$message->setReplyTo($config->noreply_email);
			}
			
			$sent = $message->send();
			if(!$sent) {
				throw new \Exception('Unsuccessful sending');
			}
			
			return $this->status = self::STATUS_OK;
		}
		catch(\Exception $e) {
			$this->result = 'ERROR: ' . $e->getMessage();
		}
		return $this->status = self::STATUS_ERROR; 
	}
}
