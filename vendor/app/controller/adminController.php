<?php 
/**
 * Class : AdminController
 * contains logic for admin route 
 * provide view for admin 
 */

class AdminController extends controller{
	public $view ;

	public function index(){
		# AdminView instance 
		$this->view = new AdminView ;
		$this->view->output() ;
	}
}


?>