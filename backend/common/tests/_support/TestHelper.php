<?php
namespace common\tests\_support;

class TestHelper {
    
    public function getMethod($className, $methodName) {
        $class = new \ReflectionClass($className);
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);
        return $method;
    }
    
    public function getMethodForInstance($classInstance, $methodName) {
        $class = new \ReflectionClass($classInstance);
        $method = $class->getMethod($methodName);
        $method->setAccessible(true);
        return $method;
    }
    
    public function getFieldForInstance($classInstance, $fieldName) {
        $class = new \ReflectionClass($classInstance);
        $field = $class->getProperty($fieldName);
        $field->setAccessible(true);
        return $field;
    }
}