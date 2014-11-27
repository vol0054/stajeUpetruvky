<?php
namespace \App\Components;
use \App\Model;

class aktualityControl extends \Nette\Application\UI\Control{
    
    /** @var \App\Model\AktualityModel; */
    private $AktualityModel;
    
    /** @var string */
    private $aktuality;
    
    public function __construct($AktualityModel){
	$this->AktualityModel = $AktualityModel;
	
    }
    
    
    public function render(){
	$template->setFile(__DIR__ . '/Aktuality.latte');
	$this->template->AktualityModel = $this->AktualityModel;
	$this->template->Aktuality = $this->aktuality;
	$this->template->render();
    }
}
