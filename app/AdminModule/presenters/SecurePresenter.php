<?php
namespace App\AdminModule\presenters;
use Nette\Security\user;
use Nette\Application\ForbiddenRequestException;

class SecurePresenter extends BasePresenter{
    
	
    protected function startup(){
	parent::startup();
	if(!$this->user->isLoggedIn()){
	    if($this->user->getLogoutReason() === User::INACTIVITY) {
			$this->flashMessage('Byl jsi odhlášen, protože jsi nebyl dlouho aktivní.', 'warning');
	    }
	    $this->flashMessage('Pro vstup do této části webu se musíš přihlásit.', 'warning');
	    $backlink = $this->storeRequest();
	    $this->redirect('Auth:default', array('backlink' => $backlink));
	} else {
	    if(!$this->user->isAllowed('administrace', $this->getAction())) {
		throw new ForbiddenRequestException('Pro vstup do této sekce nemáte dostatečné oprávnění.');
	    }
	}
	
    }
    
   
}
