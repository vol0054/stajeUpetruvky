<?php


namespace App\FrontModule\presenters;
use Nette\Utils\Paginator;
use NasExt;

class GaleriePresenter extends BasePresenter{
    /**
     * @inject
     * @var \App\Model\GalleryModel
     */    
    public $GalleryModel;


    public function renderDefault(){
	
	$list = $this->GalleryModel->getAllImages();
	$listCount = $list->count();
	/** @var NasExt\Controls\VisualPaginator $vp */
		$vp = $this['vp'];
		$paginator = $vp->getPaginator();
		$paginator->itemsPerPage = 25;
		$paginator->itemCount = $listCount;
		$images = $list->limit($paginator->itemsPerPage, $paginator->offset);
		$this->template->images = $images;
    }
    protected function createComponentVp($name){
	return new \NasExt\Controls\VisualPaginator();
    }       
    
}
