<?php
namespace App\AdminModule\presenters;
use Nette;
use Mesour\DataGrid\NetteDbDataSource,
	Mesour\DataGrid\Grid;

class UsersPresenter extends SecuredPresenter{
    
    /**
     * @inject
     * @var \App\Model\UserManager
     */
    public $UserManager;
    
    public function renderDefault(){
	$this->template->users = $this->UserManager->getAll();
    }
    
    
   protected function createComponentBasicDataGrid($name) {
	$source = new NetteDbDataSource($this->UserManager->getAll());
 
	$source->setPrimaryKey('id'); // primary key is now used always, default is "id"
 
	$grid = new Grid($this, $name);
 
	$grid->setDataSource($source);
	$grid->enablePager(20);
	$grid->enableEditableCells();
	
 
	return $grid;
    }
    
    
    
}
