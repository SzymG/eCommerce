<?php
namespace common\helpers;

use yii\base\Model;

class ModelHelper {
    
    public static function loadMultiple($data, $modelClass, $setEditScenario = false) {
    	$model = new $modelClass();
    	$modelData = empty($data[$model->formName()]) ? [] : $data[$model->formName()];
    	
        $models = [];
        foreach($modelData as $id => $modelRow) {
        	$models[$id] = new $modelClass();
        	if($setEditScenario) {
        		$models[$id]->setEditScenario();
        	}
        }
        
        Model::loadMultiple($models, $data);
        return $models;
    }
    
    public static function validateMultiple($models) {
        $validationResult = Model::validateMultiple($models);
        $errors = [];
        if(!empty($models)) {
            $class = get_class(reset($models));
            $errors = $class::globalValidate($models);
            
            if(!empty($errors)) {
                foreach($models as $i => $model) {
                    if(array_key_exists($i, $errors)) {
                        foreach($errors[$i] as $error) {
                            $model->addError($error['field'], $error['message']);
                        }
                    }
                }
            }
        }
        
        return $validationResult && empty($errors);
    }
    
    public static function getErrorsMultiple($models) {
        $modelsWithError = array_filter($models, function($model) {
            return $model->hasErrors();
        });
        
        $globalErrors = [];
        $globalVisualizationMessage = '';

        if(!empty($modelsWithError)) {
            foreach($modelsWithError as $i => $model) {
                // standardowa, pierwotna wersja
                //$errors[] = $model->getErrors();
                
                $formName = mb_strtolower($model->formName(), 'utf-8');
                foreach($model->getErrors() as $field => $errors) {
                    $globalErrors[$formName.'-'.$i.'-'.$field] = $errors;
                }
            }
        }
        
        if($globalVisualizationMessage != '') {
            \Yii::$app->session->setFlash('error', $globalVisualizationMessage);
        }
        
        return $globalErrors;
    }
}