<?php 
namespace database\migration;
/**
 * Class : Migration
 * This class provide the functionailty to create tables
 */

class Migration{

	/**
	 * This function lets you create table 
	 */
	protected function create($tableName , $function){
		echo 'your table name ='.$tableName ;
		$function->__invoke();
		echo 'jjjjjjjjjjj';
	}
}
?>