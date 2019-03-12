<?php 
namespace database\migration;
/**
 * Class : Migration
 * This class provide the functionailty to create tables
 */

# Including database drivers 
#$path = __DIR__.'\Database.php' ;
#require $path ;

#use database\Database as DB;

class Migration{

	/**
	 * This function lets you create table 
	 */
	protected function create($tableName , $params){
		
		#DB::test() ;
		#var_dump( json_decode($params) );
		$feed = json_decode($params) ;
		$sql = 'CREATE TABLE '.$tableName.'(' ;

		# parsing json feed 
		foreach($feed as $obj=>$k){
			$attr = implode(' ', $k->attributes ) ;
			$sql .= ' '.$k->columnName.' '.$attr.',' ;

		}
		$sql = substr($sql , 0, -1) ;
		$sql .=')' ;

		#connecting to database 
		$conn = new \mysqli("localhost", "root", "" ,"jaipur_transit");

		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		} 
		
		if ($conn->query($sql) === TRUE) {
    		echo "Table $tableName created successfully";
		} else {
    		throw new \Exception("oops something happened check your schema again...") ;
		}

		$conn->close();

	}

	/**
	 * This function build the sql query 
	 */
	public function schema(){
	}

	
}
?>