<?php 
/**
 * Class : HomeController
 * contains view and logic for /home route 
 */

class HomeController extends controller{
	public $view ;

	public function index(){
		# intilizing view instance
		$this->view = new HomeView ;
		$this->view->output() ;
	}
}
?>