<?php

namespace App\FrontModule\presenters;
use App\Model;
use App\components\forms\SignInFormFactory;
use Exception;

class RegisterPresenter extends BasePresenter{
    /** 
     * @inject 
     * @var \App\Model\userManager
    */
    public $userManager;
    
    
    
    public function createComponentRegisterForm(){
	
	$f = (new SignInFormFactory)->create();
	$f['Submit']->caption='registrovat';
	$f->onSuccess[] = $this->registerFormOK;
	return $f;
    }
    
    public function registerFormOK($f){
	
	$values= $f->getValues();
	/*@TODO dodelat validaci existujiciho uzivatele
	 * http://forum.nette.org/cs/19774-jak-pri-registraci-overit-existujiciho-uzivatele
	 *
	/*vyhleda existujici username*/
	/*
	$username=$this->database->table('users')->get($values->username);
	if($username == NULL){
	    $this->userManager->add($values->username,$values->password);
	    $this->flashMessage('registrace probehla uspesne');
	    
	}else{
	    //throw new Exception('uzivatel se stejnym username jiz existuje');
	    $this->flashMessage('uzivatel se stejnym jmenem jiz existuje');
	}*/
	$this->userManager->add($values->username,$values->password);
	$this->flashMessage('registrace probehla uspesne');
    }
}
