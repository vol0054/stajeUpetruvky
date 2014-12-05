<?php
namespace App\components\Navigation;

class NavigationControl extends \App\components\BaseControl{
    
    
    
    
    public function render(){
	$this->template->setFile(__DIR__.'/Navigation.latte');
	
	$this->template->render();
    }
}
