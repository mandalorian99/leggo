<?php 
/**
 * Class : YOUR_MODEL_CLASS_NAME 
 * This class fetch data from the test table  
 */

class meerModel extends Model{
	private $table_name ='meer' ;

	public function index(){
		// intilizing model instance 
		parent::__construct() ;

		$sql = 'SELECT * FROM '.$this->table_name ;
		$this->db->query($sql) ;
		$row = $this->db->resultset() ;
		return $row ;
	}
}

?>