<?php 
/**
 * Class : IndexController
 * Evoke the index view and contains logic for index
 */

class IndexController extends controller{
	public $view ;
	# evoke view for index page
	public function index(){
		# intilizing view instance
		$this->view = new IndexView ;
		# calling view class to output template
		$this->view->output() ;
	}
}

?>