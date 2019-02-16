<?php 
/**
 * Class : ViewTestModel 
 * This class fetch data from the test table  
 */

class ViewTestModel extends Model{
	private $table_name ='test' ;

	public function get_test_data(){
		// intilizing model instance 
		parent::__construct() ;
		$sql = 'SELECT * FROM '.$this->table_name ;
		$this->db->query($sql) ;
		$row = $this->db->resultset() ;
		return $row ;
	}
}

?>