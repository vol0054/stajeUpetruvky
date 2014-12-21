<?php

namespace App\AdminModule\Presenters;
use Nette\Security\User;

abstract class BasePresenter extends \App\presenters\BasePresenter{
    
    public function startup()
    {
        parent::startup();
    }
    
   public function beforeRender() {
        $this->template->sideMenuItems=[
            'Home' => 'Homepage:',
            'Aktuality' => 'Aktuality:',
            'Galerie' => 'Gallery:',
            'Stranky' => 'Stranky:',
            'Uzivatele' => 'Uzivatele:',
        ];
        
        
    }
    
}
