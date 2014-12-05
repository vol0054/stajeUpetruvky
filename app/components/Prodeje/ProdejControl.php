<?php
namespace App\components\Prodeje;
use Nette\Application\UI\Control;
use App\Model;
class ProdejControl extends Control{
    
    /** @var \App\Model\AktualityModel; */
    private $AktualityModel;
    
    /** @var string */
    private $prodeje;
    
    public function __construct($aktualityModel) {
	$this->AktualityModel = $aktualityModel;
    }
    
    public function render(){
	$this->template->setFile(__DIR__.'/Prodej.latte');
	$this->template->AktualityModel = $this->AktualityModel;
	$this->template->prodeje = $this->AktualityModel->getLastSell();
	$this->template->render();
    }
}
