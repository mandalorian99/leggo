<?php 
/**
 * Class : HomeView
 * 
 */

class HomeView extends View{
	public $template_name = 'home.blade' ;
	public $data ;

	public function output(){
		$this->render($this->template_name , $this->data) ;
	}
}
?>