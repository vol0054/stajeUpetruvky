<?php
namespace App\Model;
use nette;
class AktualityModel extends BaseModel{
    
    public function getLastAkt(){
	return $this->database->table('aktuality')->order('created_at DESC')->limit(1);
    }
    
    public function getAllAkt(){
	return $this->database->table('aktuality');
    }
    
    public function getLastSell(){
	return $this->database->table('prodej')->order('created_at DESC')->limit(1);
    }
    
    
    
    
}
