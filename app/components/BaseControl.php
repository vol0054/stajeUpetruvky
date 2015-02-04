<?php

namespace App\components;
use Nette\Database\Context;
use Nette\Application\UI\Control;

class BaseControl extends Control{
    
    /** @var \Nette\Database\Context */
    protected $database;
    
    public function __construct(\Nette\Database\Context $database){
	$this->database = $database;
    }
    
    
}
