<?php


namespace App\FrontModule\presenters;
use Nette\Utils\Paginator;
use NasExt;

class AktualityPresenter extends BasePresenter{
  
    public function renderDefault() {
        
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
