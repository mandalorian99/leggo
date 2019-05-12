<?php 
class LoginController extends controller{
	public $view  ;
	/**
	 * evoke repective view for this controller and uri
	 */
	public function index(){
		# initilizing view to work with view class
		$this->view = new loginView ;
		$this->view->output() ;

	}
}
?>