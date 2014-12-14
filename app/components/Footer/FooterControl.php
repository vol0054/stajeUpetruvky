<?php
namespace App\components\Footer;
use Nette\Application\UI\Control;

class FooterControl extends Control{
    
    public function __construct() {
	
    }
    
    public function render(){
    
	$this->template->setFile(__DIR__.'/Footer.latte');
	
	$this->template->render();
    }
    
}
