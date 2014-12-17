<?php

namespace App\AdminModule\presenters;

use Nette\Application\UI\Form;
use Nette\Utils\Image;
use App\components\forms\SignInFormFactory;

class GalleryPresenter extends BasePresenter{
    
    public function renderDefault(){
        $gallery = $this->template->galleries = $this->database->table('galerie');
        
        
    }
    public function renderView($galleryId){
        
        $this->database->table('galerie')->get($galleryId);
        $this->template->images = $this->database->table('obrazek')->where('id_galerie', $galleryId);
        return $galleryId;
	
    }

    public function createComponentNewGalleryForm(){
        
        $form = new Form();
        
        $form->addText('nazev','Nazev galerie:')->setRequired();
        $form->addText('popis','Popis galerie:');
        $form->addSubmit('submit','vytvorit');
        
	$this->flashMessage('galerie byla uspesne vytvorena', 'success');
        $form->onSuccess[] = $this->newGallerySuccess;
	
        return $form;
    }
    
    public function newGallerySuccess($form){
        $values = $form->getValues();
        
        $this->database->table('galerie')->insert([
            'nazev' => $values->nazev,
            'popis' => $values->popis,
        ]);
        $this->redirect('Gallery:default');
    }
    
    public function createComponentNewPicture(){
        $form = new Form();
        
	
        $form->addText('nazev','nazev obrazku');
	$form->addText('popis','popis obrazku');
	
	$form->addUpload('file','obrazek');
        $form->addSubmit('submit','Nahrat');
        
        
        $form->onSuccess[] = $this->NewPictureSuccess;
        return $form;
    }
    
    public function NewPictureSuccess($form){
        $values = $form->getValues();
	try{
	    $file = $values->file;
	    if($file->isImage() AND $file->isOk()){
		
		$pripona = pathinfo($values['file']->getSanitizedName(), PATHINFO_EXTENSION);
		$nazev=$values->nazev.'.'.$pripona;
		$image = $values['file']->toImage();
		$file->move(WWW_DIR . '/gallery/'.$nazev);
		
		
		
	    }
	} catch (Exception $ex) {
	    $form->addError($ex->getMessage());
	}
	
	
	/*insert do db*/
	$this->database->table('obrazek')->insert([
	    'id_galerie' => '1',
	    'nazev' => $values->nazev,
	    'popis' => $values->popis,
	    //'cesta_k_souboru' => $nazev,
	]);
	
	$this->redirect('this');
    }
    
    public function createComponentSignInForm(){
	$f = (new SignInFormFactory)->create();
	//$f['username']->caption= 'novy nazev';
	return $f;
    }
    
    
}
