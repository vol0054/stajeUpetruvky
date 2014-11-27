<?php

namespace App\FrontModule\Presenters;
use Nette,
	App\Model;

class BasePresenter extends \App\Presenters\BasePresenter{
    
    
    public function renderDefault(){
        $this->template->aktuality = $this->AktualityModel->getLastAkt();
        $this->template->prodeje = $this->AktualityModel->getLastSell();
    }
    
    
    
    
}
