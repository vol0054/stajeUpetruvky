<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GaleriePresenter
 *
 * @author kytaveprova
 */

namespace App\FrontModule\presenters;

class GaleriePresenter extends BasePresenter{
    
    
    /*public function renderGallery($folder) {
    $this->template->folder = $folder;
    $this->template->images = Nette\Utils\Image::fromFile($folder, '*');
    }*/
    
    public function renderDefault(){
    $this->template->aktuality =  $this->database->table('aktuality')->order('created_at DESC')->limit(1);
    $this->template->prodeje =  $this->database->table('prodej')->order('created_at DESC')->limit(1);
    $this->template->images = $this->database->table('obrazek');   
    }
    
        
        
        
    
}
