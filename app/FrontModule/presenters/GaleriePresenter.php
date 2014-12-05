<?php


namespace App\FrontModule\presenters;

class GaleriePresenter extends BasePresenter{
    
    public function renderDefault(){
    
    $this->template->images = $this->database->table('obrazek');   
    }
    
        
        
        
    
}
