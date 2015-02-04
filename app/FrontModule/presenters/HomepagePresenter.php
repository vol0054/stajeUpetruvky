<?php

namespace App\FrontModule\Presenters;




/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    
    public function renderDefault($title='Uvodem'){
	
	$this->template->Content = $this->database->table('page')->where('slug',$title)->fetch();
	
    }
    
    

}
