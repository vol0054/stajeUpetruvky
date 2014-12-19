<?php

namespace App\AdminModule\Presenters;

abstract class BasePresenter extends \App\presenters\BasePresenter{
    
    public function startup()
    {
        parent::startup();
    }
    
    public function beforeRender() {
        $this->template->identity = $this->user->identity;
    }
    
}
