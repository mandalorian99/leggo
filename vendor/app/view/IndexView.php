<?php 
/**
 * Class : IndexView 
 * Contains template and data for index view
 */

class IndexView extends View{
	public $template_name = 'index.blade' ;
	public $data ;

	# calls parent render function to supply tempate and data
	public function output(){
		
		$this->render($this->template_name , $this->data) ;
	}
}

?>