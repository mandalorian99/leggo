<?php 
/**
 * Class :Model 
 * 
 * Create a new instance of the Database class.
 * 
 * The Model class is an abstract class that creates
 * a new instance of the Database class, allowing us
 * to interact with the database without having to create
 * a new instance in each class.
 */
require $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/database/Database.php'  ;

use database\Database as Database ;

abstract class Model{

	public $db ;
	public  $test ="mango" ;

	public function __construct(){
		echo 'parent: creating a db handler for you....';
		$this->db = new Database() ;
	}
}

?>