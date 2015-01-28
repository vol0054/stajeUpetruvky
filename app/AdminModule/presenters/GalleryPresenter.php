<?php

namespace App\AdminModule\presenters;

use Nette\Application\UI\Form;
use Nette\Utils\Image;
use App\components\forms\SignInFormFactory;
use Mesour\DataGrid\NetteDbDataSource,
	Mesour\DataGrid\Grid;

class GalleryPresenter extends SecuredPresenter{    
    
    /**  
     * @inject
     * @var \App\Model\GalleryModel
     */
    public $GalleryModel;
    
    public function renderDefault(){
	
        $this->template->images = $this->GalleryModel->getAllImages();
        
    }
    public function renderView($galleryId){
        
        $this->database->table('galerie')->get($galleryId);
        $this->template->images = $this->database->table('obrazek')->where('id_galerie', $galleryId);
        return $galleryId;
	
    }
    
    
    
    public function createComponentNewPicture(){
        $form = new Form();
        
	
        $form->addText('nazev','nazev obrazku');
	$form->addText('popis','popis obrazku');
	
	$form->addUpload('file','obrazek',TRUE);
        $form->addSubmit('submit','Nahrat');
        
        
        $form->onSuccess[] = $this->NewPictureSuccess;
        return $form;
    }
    
    public function NewPictureSuccess($form){
        $values = $form->getValues();
	
	$this->GalleryModel->save($values);
	
	
	$this->redirect('this');
    }
    
    
    
    protected function createComponentBasicDataGrid($name) {
	$source = new NetteDbDataSource($this->database->table('obrazek'));
 
	$source->setPrimaryKey('id'); // primary key is now used always, default is "id"
 
	$grid = new Grid($this, $name);
 
	$grid->setDataSource($source);
	$grid->enablePager(20);
	$grid->enableEditableCells();
	
	
	
 
	return $grid;
    }
}
