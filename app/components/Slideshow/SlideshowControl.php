<?php
namespace App\components\Slideshow;
use Nette\Application\UI\Control;
use App\Model;


class SlideshowControl extends Control{  
    
    
    public function __construct(){
	
	
    }
    
    public function render(){
	$this->template->setFile(__DIR__.'/Slideshow.latte');
	
	$this->template->render();
    }
    
}