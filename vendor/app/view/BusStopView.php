<?php 
/**
 * Class : BusStopView 
 * Contains logic for stop route 
 * Evoke template 
 * work with BusStopModel 
 */

class BusStopView extends View{
	public $template_name = 'bus_stop.blade' ;
	public $model ;
	public $data ;

	public function __construct(){
		# initiate BusStopModel instance 
		$this->model = new BusStopsModel ;
	}

	public function output(){
		# Retching coordinates of bus stop from table 
		# then passing this data into view 
		$this->data = $this->model->get() ;
		$this->render($this->template_name , $this->data) ;
	}
}

?>