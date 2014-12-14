<?php


namespace App\FrontModule\presenters;

class GaleriePresenter extends BasePresenter{
    
    public function renderDefault(){
	$galeries = $this->database->table('galerie');
	$this->template->galleries = $galeries;
	
	$images =
	$this->template->images = $this->database->table('obrazek');   
    }
    
        
        
        
    
}
