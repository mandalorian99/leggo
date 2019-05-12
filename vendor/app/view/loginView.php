<?php 
/**
 * Class : <YOUR_VIEW_CLASS_NAME>
 * render data with template and output html content
 */

class loginView extends View{

 	public $template_name = 'login.blade' ;
 	public $data ;

 	public function __construct(){
 		// intilizing YOUR_VIEW_CLASS_MODEL 
 		$this->model = new loginModel ; 		
 	}

 	public function output(){
 		$this->data = $this->model->get_login_info() ;
 		$this->render($this->template_name , $this->data) ;
 	}

}

?>