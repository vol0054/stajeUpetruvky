<?php

namespace App\FrontModule\Presenters;
use Nette,
	App\Model;
use Nette\Application\UI\Form;


class BasePresenter extends \App\Presenters\BasePresenter{
   
    protected function createComponentNavigation(){
	$navigation =  new \App\components\Navigation\NavigationControl($this->database);
	return $navigation;
    }
    
    
    
}
