<?php
namespace App\Model;


class GalleryModel extends BaseModel{

    public function getAllGalleries(){
        
        $this->database->table('galerie');
        
    }
}
