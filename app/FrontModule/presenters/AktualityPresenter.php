<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AktualityPresenter
 *
 * @author KytaVeprova
 */

namespace App\FrontModule\presenters;
use Nette\Utils\Paginator;
use NasExt;

class AktualityPresenter extends BasePresenter{
  
    public function renderDefault() {
        //$this->template->aktual =  $this->database->table('aktuality')->order('created_at DESC');
        $this->template->prode = $this->AktualityModel->getLastSell();
        $this->template->aktuality = $this->AktualityModel->getLastAkt();
	$this->template->prodeje = $this->AktualityModel->getLastSell();
	
	
	$list = $this->AktualityModel->getAllAkt();
	$listCount = $list->count();
	/** @var NasExt\Controls\VisualPaginator $vp */
		$vp = $this['vp'];
		$paginator = $vp->getPaginator();
		$paginator->itemsPerPage = 3;
		$paginator->itemCount = $listCount;
		$aktuality = $list->limit($paginator->itemsPerPage, $paginator->offset);
		$this->template->a = $aktuality;
    }
    
    protected function createComponentVp($name)
	{
	   $control = new NasExt\Controls\VisualPaginator($this, $name);
	   return $control;
	}
   
    

}
