<?php 
//migation template
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

$path = str_replace("\\", "/" , $baseDir) ;
$path .='/vendor/database/Migration.php' ;

require $path ;

use database\migration\Migration as Migration ;

class createLoginTable extends migration{
	public $table_name = 'userInfo' ;

	public function up(){
		#code goes here...
		$this->create($this->table_name , '[
			{
				"columnName":"id" ,
				"attributes":["INT(6)" ,"NOT NULL" ,"AUTO_INCREMENT" , "PRIMARY KEY"] 
			} ,

			{
				"columnName":"name" , 
				"attributes" :["VARCHAR(20)" ,"NOT NULL"]
			} ,
			{
				"columnName":"email" ,
				"attributes" :["VARCHAR(20)" ,"NOT NULL"]
			} 
		]');	
	}

	public function down(){
		#code goes here...
	}
}

?>