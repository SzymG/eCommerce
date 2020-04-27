<?php
namespace backend\components;

use Yii;
use yii\helpers\Html;

/**
 * Wrapped class for framework-based ActionColumn
 */
class ActionColumn extends \yii\grid\ActionColumn {

	public $deleteGlyphiconSuffix = 'trash';
	public $deleteLabel;
	public $deleteConfirmMessage;

	public function init() {
		if(empty($this->deleteConfirmMessage)) {
			$this->deleteConfirmMessage = Yii::t('yii', 'Are you sure you want to delete this item?');
		}
		parent::init();
	}

	protected function initDefaultButtons() {
		if(!isset($this->buttons['view'])) {
			$this->buttons['view'] = function($url, $model, $key) {
				$options = array_merge([
						'title' => Yii::t('yii', 'View'),
						'aria-label' => Yii::t('yii', 'View'),
						'data-pjax' => '0',
				], $this->buttonOptions);

				if(is_array($model) && isset($model['id'])) {
					$url = $this->transformUrl($url, $model);
				}
				
				return Html::a('<i class="far fa-eye"></i>', $url, $options);
			};
		}

		if(!isset($this->buttons['update'])) {
			$this->buttons['update'] = function($url, $model, $key) {
				$options = array_merge([
						'title' => Yii::t('yii', 'Update'),
						'aria-label' => Yii::t('yii', 'Update'),
						'data-pjax' => '0',
				], $this->buttonOptions);
				
				if(is_array($model) && isset($model['id'])) {
					$url = $this->transformUrl($url, $model);
				}

				return Html::a('<i class="far fa-edit"></i>', $url, $options);
			};
		}

		if(!isset($this->buttons['delete'])) {
			$this->buttons['delete'] = function($url, $model, $key) {
				$options = array_merge([
						'title' => $this->deleteLabel?:Yii::t('yii', 'Delete'),
						'aria-label' => $this->deleteLabel?:Yii::t('yii', 'Delete'),
						'data-confirm' => $this->deleteConfirmMessage,
						'data-method' => 'post',
						'data-pjax' => '0',
				], $this->buttonOptions);
				
				if(is_array($model) && isset($model['id'])) {
					$url = $this->transformUrl($url, $model);
				}

				return Html::a('<i class="far fa-trash-alt"></i>', $url, $options);
			};
		}
	}
	
	private function transformUrl($url, $model) {		
		$fragments = explode('/', $url);
		$count = count($fragments);
		$fragments = array_slice($fragments, 0, $count - 1);
		$fragments[] = $model['id'];
		return implode('/', $fragments);
	}
}