<?php

namespace App\Presenters;

use Nette,
	App\Model,
	App\components;


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
	$this->template->menuItems=[
            'Uvodem'=>'Homepage:',
            'Co nabizime'=>'Nabidka:',
            'Aktuality'=>'Aktuality:',
            'Nasi konici'=>'Konici:',
            'Galerie'=>'Galerie:',
            'Kontakt'=>'Kontakt:',
        ];
        
	$this->AktualityModel = new \App\Model\AktualityModel($this->database);
        
    }
    
    public function handleLogout() {
            $this->user->logout(TRUE);
            $this->flashMessage('Odhlášení proběhlo úspěšně.', 'info');
            $this->redirect('this');
    }
    
    protected function createComponentAktuality(){
	$aktuality = new components\Aktuality\AktualityControl($this->AktualityModel);
	return $aktuality;
    }
    protected function createComponentProdej(){
	return new components\Prodeje\ProdejControl($this->AktualityModel);
    }
    protected function createComponentSlideshow(){
	return new components\Slideshow\SlideshowControl();
    }
    protected function createComponentNavigation(){
	return new components\Navigation\NavigationControl();
	
    }
    
    
}
