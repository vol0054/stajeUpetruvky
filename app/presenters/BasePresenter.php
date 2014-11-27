<?php

namespace App\Presenters;

use Nette,
	App\Model,
	App\Components;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    protected $database;
    /** @var articleModel */
    public $AktualityModel;
    
    public function __construct(Nette\Database\Context $database) {
        $this->database=$database;
    }
    
    public function beforeRender() {
        parent::beforeRender();
        $this->template->menuItems=array(
            'Uvodem'=>'Homepage:',
            'Co nabizime'=>'Nabidka:',
            'Aktuality'=>'Aktuality:',
            'Nasi konici'=>'Konici:',
            'Galerie'=>'Galerie:',
            'Kontakt'=>'Kontakt:',
            
            
        );
	$this->AktualityModel = new \App\Model\AktualityModel($this->database);
        
    }
    
    public function handleLogout() {
            $this->user->logout(TRUE);
            $this->flashMessage('Odhlášení proběhlo úspěšně.', 'info');
            $this->redirect('this');
    }
    
    public function createComponentAktuality(){
	return new Components\aktualityControl($this->AktualityModel);
    }
    
    


	
    
    
    
}
