<?php 
/**
 * Class : BusStopModel 
 * 
 * CRUD data from bus_terminals_lat_long table 
 * 
 */ 
require $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/app/model/Model.php' ;

class BusStopsModel extends Model{
	
	public function get(){

		#echo '\n\tget evoked...';
		parent::__construct() ;
		$sql = 'SELECT * FROM bus_terminals_lat_long ' ;
		$this->db->query($sql) ;
		$row = $this->db->resultset() ;
		return $row ;
	}
}
?>