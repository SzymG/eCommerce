<?php
namespace common\tests\_support;

class DummyClass {
    
    public $publicParam1;
    public $publicParam2;
    
    protected $protectedParam1;
    
    private $privateParam1;
    
    public function __construct($publicParam1, $publicParam2) {
        $this->publicParam1 = $publicParam1;
        $this->publicParam2 = $publicParam2;
    }
   
}