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
namespace App\AdminModule\presenters;
use Nette,
        Nette\Application\UI\Form,
        Nette\Utils\Paginator;
use NasExt;
        
class AktualityPresenter extends SecuredPresenter{
    
    
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
    
    
    public function renderDefault(){
        //$this->template->a =  $this->database->table('aktuality')->order('created_at DESC')->page($page, 10);
        $list = $this->database->table('aktuality')->order('created_at DESC');
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
