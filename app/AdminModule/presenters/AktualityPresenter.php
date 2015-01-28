<?php

namespace App\AdminModule\presenters;
use Nette,
        Nette\Application\UI\Form,
        Nette\Utils\Paginator;
use NasExt;
use Mesour\DataGrid\NetteDbDataSource,
	Mesour\DataGrid\Grid;
class AktualityPresenter extends SecuredPresenter{
    
    protected $activeSelected;
    protected $unactiveSelected;
    protected $deleteSelected;
    
    public function createComponentNovAktForm(){
        $form= new Form();
        //$form->addHidden('id');
        $form->addText('title','Nadpis');
        $form->addTextArea('text','text nove aktuality:')
                ->addRule(Form::MAX_LENGTH, 'text musí mít alespoň %d znaky', 255);
        $form->addSubmit('send', 'Odeslat');
        
        // call method signInFormSucceeded() on success
        $form->onSuccess[] = $this->AktFormSucceeded;
        
        return $form;
    }
    
    public function AktFormSucceeded($form){
        
        
        $values = $form->getValues();
        $aktId = $this->getParameter('id');

        if ($aktId) {
            $akt = $this->database->table('aktuality')->get($aktId);
            $akt->update($values);
        } else {
            $akt = $this->database->table('aktuality')->insert($values);
        }

        $this->flashMessage('Aktualita byla úspěšně publikována.', 'alert alert-success');
        $this->redirect('default');
    }
    
    protected function createComponentGrid($name){
	$source = new NetteDbDataSource($this->AktualityModel->getAllAkt());
 
	$source->setPrimaryKey('id'); // primary key is now used always, default is "id"
 
	$grid = new Grid($this, $name);
	$grid->setDataSource($source);
	$grid->enablePager(20);
	$grid->enableEditableCells();
	
	//$selection = $grid->enableRowSelection();
	/*
	$selection->addLink('Active')
	    ->onCall[] = $this->activeSelected;
 
	$selection->addLink('Unactive')
	    ->setAjax(FALSE)
	    ->onCall[] = $this->unactiveSelected;
 
	$selection->addLink('Delete')
	    ->setConfirm('Really delete all selected users?')
	    ->onCall[] = $this->deleteSelected;
	
	$status_column = $grid->addStatus('action', 'Edit');
	$status_column->addButton()
	    ->setStatus('0') // show if status == 0
	    ->setType('btn-danger')
	    ->setClassName('ajax')
	    ->setIcon('glyphicon-ban-circle')
	    ->setTitle('Set as active (unactive)');*/
	return $grid;
    }
    
    public function renderDefault(){
        
        $list = $this->AktualityModel->getAllAkt();
	$listCount = $list->count();
	
	/** @var NasExt\Controls\VisualPaginator $vp */
		$vp = $this['vp'];
		$paginator = $vp->getPaginator();
		$paginator->itemsPerPage = 5;
		$paginator->itemCount = $listCount;
		$aktuality = $list->limit($paginator->itemsPerPage, $paginator->offset);
		$this->template->a = $aktuality;
	
        
        
        
        
    }
    
    public function actionEdit($id)
    {
        $akt = $this->database->table('aktuality')->get($id);
        if (!$akt) {
            $this->error('Aktualita nebyla nalezena');
        }
        $this['novAktForm']->setDefaults($akt->toArray());
    }
    
    public function actionDelete($id){
        
        $delete = $this->database->table('aktuality')->get($id);
        if(!$delete){
            $this->error('Aktualita nebyla nalezena');
        }
        $this->database->query('DELETE FROM aktuality WHERE id='.$id);
        
        $this->flashMessage('Aktualita byla úspěšně smazána!.', 'alert alert-danger');
        $this->redirect('default');
        
        
    }
    
    /**
	* @return NasExt\Controls\VisualPaginator
	*/
	protected function createComponentVp($name)
	{
	   $control = new NasExt\Controls\VisualPaginator($this, $name);
	   return $control;
	}
    
   
    
    
	
}
