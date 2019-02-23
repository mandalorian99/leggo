<?php 
class <YOUR_VIEWCLASS_NAME> extends controller{
	public $view  ;
	/**
	 * evoke repective view for this controller and uri
	 */
	public function index(){
		# initilizing view to work with view class
		$this->view = new <YOUR_VIEW_CLASSNAME>
		$this->view->output() ;

	}
}
?>