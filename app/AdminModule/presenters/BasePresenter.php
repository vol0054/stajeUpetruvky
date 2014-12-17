<?php

namespace App\AdminModule\Presenters;

abstract class BasePresenter extends \App\presenters\BasePresenter{
    
    protected function startup() {
		parent::startup();
	}
    protected function beforeRender()	{
		if($this->isAjax()) {
			$this->invalidateControl('flash');
		}
	
		$this->template->identity = $this->user->identity;
	}
    public function handleSignOut()
    {
        $this->getUser()->logout();
        $this->redirect('Sign:in');
    }
    
}
