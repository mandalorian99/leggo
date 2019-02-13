<?php 
# controller to mark bus stop coordinates on the map 
require_once $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/app/controller/controller.php' ;
require_once  $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/app/model/BusStopsModel.php' ;

Class BusStopController extends controller{
	# functin to retrieve bus stop latitude and longitude 
	# used further by api to get data in json format
	public function get_bus_stop_coords(){
		#header("Access-Control-Allow-Orgin: *");
        #header("Access-Control-Allow-Methods: *");
        #header("Content-Type: application/json");

		$coords = new BusStopsModel() ;
		$data = $coords->get() ;
		/**
		 * Creating view and supply data to it
		 */

		

	}
	# return json data to api endpoint 
	public function get_all_bus_stops_coords(){
		$coords = new BusStopsModel() ;
		return $coords->get() ;
		
	}
}
?>