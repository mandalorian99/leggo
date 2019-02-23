<?php 
/**
 * Class : YOUR_MODEL_CLASS_NAME 
 * This class fetch data from the test table  
 */

class <YOUR_MODEL_CLASS_NAME> extends Model{
	private $table_name ='YOUR_TABLE_NAME' ;

	public function YOUR_FUNCTION_NAME(){
		// intilizing model instance 
		parent::__construct() ;

		$sql = 'SELECT * FROM '.$this->table_name ;
		$this->db->query($sql) ;
		$row = $this->db->resultset() ;
		return $row ;
	}
}

?>