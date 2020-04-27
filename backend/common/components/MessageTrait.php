<?php
namespace common\components;

use Yii;
use common\models\ar\EmailType;

trait MessageTrait {

	public function sendEmailMessage($email, $symbol, $tags = [], $withAlert = true, $attachments = [], $successMessage = null) {
		$helper = new EmailHelper();

		$type = EmailType::find()->where(['is_active' => 1])->andWhere(['symbol' => $symbol])->one();
		if(!$type || !($type->getEmailTemplates()->all())) {
			if($withAlert) {
				Yii::$app->getSession()->addFlash('error', Yii::t('app', 'There is no active message template with the given symbol.'));
			}
			return EmailHelper::STATUS_NO_CONTENT;
		}
		$template = $type->getBestTemplate();
		$content = $template->content_html;
		$text = $template->content_text;

		$content = $type->replacePlaceholders($content, $tags);
		$text = $type->replacePlaceholders($text, $tags);

		$content = preg_replace('/\{[\.\-_\w]+\}/i', '', $content);
		$subject = $template->subject;

		$withCopies = $type->is_archived ? true : false;

		$helper->send(['email' => $email, 'message' => $content, 'text' => $text, 'subject' => $subject, 'type' => $type, 'attachments' => $attachments, 'withCopies' => $withCopies]);
		$status = $helper->getStatus();

		if($withAlert) {
			if($status === \common\components\EmailHelper::STATUS_OK) {
				Yii::$app->getSession()->addFlash('success', $successMessage ?: Yii::t('app', 'E-mail has been sent successfully.'));
			}
			else {
				Yii::$app->getSession()->addFlash('error', Yii::t('app', 'E-mail message has not been sent. An internal error occurred.'));
			}
		}
		return $status;
	}

	public function sendEmailTestMessage($email, $subject, $content, $type, $tags = []) {
		$helper = new EmailHelper();

		$content = $type->replacePlaceholders($content, $tags);
		//$content = preg_replace('/\{[\.\-_\w]+\}/i', '', $content);

		$helper->send(['email' => $email, 'message' => $content, 'subject' => $subject, 'type' => $type]);
		$status = $helper->getStatus();

		return $status;
	}
}
