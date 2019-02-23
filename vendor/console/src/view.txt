<?php 
/**
 * Class : <YOUR_VIEW_CLASS_NAME>
 * render data with template and output html content
 */

class <YOUR_VIEW_CLASS_NAME> extends View{

 	public $template_name = '<YOUR_TEMPLATE_NAME>.blade' ;
 	public $data ;

 	public function __construct(){
 		// intilizing YOUR_VIEW_CLASS_MODEL 
 		$this->model = new <YOUR_VIEW_MODEL_CLASS> ; 		
 	}

 	public function output(){
 		$this->data = $this->model->get_test_data() ;
 		$this->render($this->template_name , $this->data) ;
 	}

}

?>