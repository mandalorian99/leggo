<?php 
/**
 * Class : <YOUR_VIEW_CLASS_NAME>
 * render data with template and output html content
 */

class meerView extends View{

 	public $template_name = 'meer.blade' ;
 	public $data ;

 	public function __construct(){
 		// intilizing YOUR_VIEW_CLASS_MODEL 
 		$this->model = new  ; 		
 	}

 	public function output(){
 		$this->data = $this->model->get_test_data() ;
 		$this->render($this->template_name , $this->data) ;
 	}

}

?>