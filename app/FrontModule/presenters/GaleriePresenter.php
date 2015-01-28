<?php


namespace App\FrontModule\presenters;

class GaleriePresenter extends BasePresenter{
    /**
     * @inject
     * @var \App\Model\GalleryModel
     */    
    public $GalleryModel;


    public function renderDefault(){
	$galeries = $this->database->table('galerie');
	$this->template->galleries = $galeries;
	
	$this->template->images = $this->GalleryModel->getAllImages();
    }
    
        
        
        
    
}
