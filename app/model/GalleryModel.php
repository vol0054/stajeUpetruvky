<?php
namespace App\Model;
use Nette\Utils\Image;

class GalleryModel extends BaseModel{
    
    
    protected $values;
    
    /** @var objekt obrazek nahrany do formulare, nebo array obrazku */
    public $image;
    
    public function getAllGalleries(){
        
        return $this->database->table('galerie');
        
    }
    /** @var */ 
    public function getAllImages(){
      return $this->database->table('obrazek');
    }
    
    /** @var zpracuje obrazky nahrane do formulare*/
    public function save($values){
	
	try{
	    $files = $values->file;
	    foreach ($files as $file){
		if($file->isImage() AND $file->isOk()){

		    $pripona = pathinfo($file->getSanitizedName(), PATHINFO_EXTENSION);
		    /* pokud neni zadany nazev obrazku (ve formulari) tak je nazev obrazku stejny jako uploadovany soubor*/
		    if(!$values->nazev){
			$nazev = $file->getSanitizedName();
		    }else{
			$nazev= $values->nazev.'.'.$pripona;
		    }

		    $image = $file->toImage();
		    $image->resize(100,100, Image::STRETCH|Image::SHRINK_ONLY);
		    $image->save(WWW_DIR.'/gallery/thumb/'.$nazev);
		    $file->move(WWW_DIR . '/gallery/'.$nazev);
		    
		    $this->database->table('obrazek')->insert([
			'nazev' => $nazev,
			'popis' => $values->popis,
			'thumb_path'=> '/thumb/'.$nazev,	    
		    ]);

		}
	    }
	} catch (Exception $ex) {
	    $form->addError($ex->getMessage());
	}
	
	/** a ulozi do db*/
		
    }
}
