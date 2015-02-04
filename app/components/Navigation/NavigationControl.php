<?php
namespace App\components\Navigation;
use App\components\BaseControl;


class NavigationControl extends BaseControl{
    
    
    
    public function render(){
	$this->template->setFile(__DIR__.'/Navigation.latte');
	$this->template->menuItems = $this->database->table('page');
	$this->template->render();
    }
}
