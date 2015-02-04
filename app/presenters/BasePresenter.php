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
    /** @var \Nette\Database */
    protected $database;
    /** 
     * @inject
     * @var \App\Model\AktualityModel */
    public $AktualityModel;
    
    /**
     * @inject
     * @var \App\Model\SlideshowModel
     */
    protected $SlideshowModel;
    
    public function __construct(Nette\Database\Context $database) {
        $this->database=$database;
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
    protected function createComponentFooter(){
	return new components\Footer\FooterControl();
	
    }
    
    
    
}
