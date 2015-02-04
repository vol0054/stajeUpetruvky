<?php
namespace App\Model;

class SlideshowModel extends BaseModel{
    
    const    
	    TABLE_NAME = 'slideshow_img',
	    COLUMN_NAZEV = 'nazev',
	    COLUMN_POPIS = 'popis',
	    COLUMN_AKTIVNI = 'aktivni',
	    COLUMN_PATH = 'path',
	    IMG_PATH = '/images/slideshow/';
	    
	    

    /** @var Image z formulare
     *
     * @var type 
     */ 
    protected $image;
    
    public function addImage($image){
	
	try{
	    $images = $image->file;
	    foreach ($images as $file){
		if($file->isImage() AND $file->isOk() ){
		    $extension = pathinfo($file->getSanitizedName(), PATHINFO_EXTENSION);
		    
		    if(!$image->nazev){
			$name = pathinfo($file->getSanitizedName(),PATHINFO_FILENAME);
		    }else{
			$name = $image->nazev.'.'.$extension;
		    }
		$img = $file->toImage();
		$img->resize(902,314, Image::STRETCH|Image::SHRINK_ONLY);
		$img->save(WWW_DIR.self::IMG_PATH.$name);
		
		$this->database->table(self::TABLE_NAME)->insert([
		    self::COLUMN_NAZEV => $nazev,
		    self::COLUMN_POPIS => $values->popis,
		    self::COLUMN_PATH => self::IMG_PATH.$name.'.'.$extension,	    
		    ]);
		}else{
		    throw new Exception('file you have upload is not image ');
		}
	    }
	} catch (Exception $ex) {

	}
    }
    
    public function getImages(){
	return $this->database->table('slideshow_img')->where('aktivni',1);
    }
}
