<?php 
/**
 * Class : ViewTest.view.php
 * render data with template and output html content
 */

class ViewTestView extends View{

 	public $template_name = 'viewTest.blade' ;
 	public $data ;

 	public function __construct(){
 		// intilizing viewtestmodel 
 		$this->model = new ViewTestModel ; 		
 	}

 	public function output(){
 		$this->data = $this->model->get_test_data() ;
 		$this->render($this->template_name , $this->data) ;
 	}

}

?>