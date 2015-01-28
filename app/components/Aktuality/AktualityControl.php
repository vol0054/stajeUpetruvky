<?php
namespace App\components\Aktuality;
use Nette\Application\UI\Control;
use App\Model;

class aktualityControl extends Control{
    
    /** 
     * @inject
     * @var \App\Model\AktualityModel; 
     */
    private $AktualityModel;
    
    /** @var string */
    private $aktuality;
    
    public function __construct($AktualityModel){
	$this->AktualityModel = $AktualityModel;
	
    }
    
    
    public function render(){
	$this->template->setFile(__DIR__.'/Aktuality.latte');
	$this->template->AktualityModel = $this->AktualityModel;
	$this->template->aktuality = $this->AktualityModel->getLastAkt();
	$this->template->render();
    }
}
