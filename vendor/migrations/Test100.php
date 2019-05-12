<?php 
//migation template
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

$path = str_replace("\\", "/" , $baseDir) ;
$path .='/vendor/database/Migration.php' ;

require $path ;

use database\migration\Migration as Migration ;

class Test100 extends migration{
	public $table_name = 'test100' ;

	public function up(){
		#code goes here...
		$this->create($this->table_name , '[
			{
				"columnName":"YOUR_TABLE_COLUMN_NAME" ,
				"attributes":[" " , " " ," " ," "] 
			} ,

			{
				"columnName":"YOUR_TABLE_COLUMN_NAME" , 
				"attributes" :["" ,""]
			} ,
			{
				"columnName":"YOUR_TABLE_COLUMN_NAME" ,
				"attributes":["" ]
			} 
		]');	
	}

	public function down(){
		#code goes here...
	}
}

?>