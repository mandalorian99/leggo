<?php 
//migation template
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

$path = str_replace("\\", "/" , $baseDir) ;
$path .='/vendor/database/Migration.php' ;

require $path ;

use database\migration\Migration as Migration ;

class createTestTable extends migration{
	public $table_name = 'test99' ;

	public function up(){
		#code goes here...
		$this->create($this->table_name , '[
			{
				"columnName":"id" ,
				"attributes":["INT(2)" , "AUTO_INCREMENT" ,"NOT NULL" ,"PRIMARY KEY"] 
			} ,

			{
				"columnName":"name" , 
				"attributes" :["VARCHAR(40)" ,"NOT NULL"]
			} ,
			{
				"columnName":"email" ,
				"attributes":["VARCHAR(50)" ,"NOT NULL" ,"UNIQUE"]
			}
		]');	
	}

	public function down(){
		#code goes here...
	}
}

?>