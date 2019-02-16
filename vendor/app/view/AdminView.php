<?php 
/**
 * Class : AdminView 
 * 
 */

class AdminView extends View{
	public $template_name = 'admin.blade' ;
	public $data ;

	public function __construct(){
		# initiate its model instance to work with data 
		# code here ...
	}

	public function output(){
		$this->render($this->template_name , $this->data) ;
	}
}

?>