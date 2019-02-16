<?php 
/**
 * Class : View 
 * Funtion :
 * Fetch data from model .Crunch ,process data into template 
 * output html resonse to the request
 */

class View{
	protected $model ;
	public $template_dir= '/live tracking/templates' ;

	public function __construct(){
		#echo'view class has intilized...' ;
		#$this->model = new BusStopsModel ;

		#print_r($this->model->db)  ;
	}
	public function render($templateName , $data ){
		require $_SERVER['DOCUMENT_ROOT'].'./'.$this->template_dir.'/'.$this->template_name.'.php' ;
		
 
	} 
}
?>