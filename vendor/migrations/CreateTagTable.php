<?php 
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

$path = str_replace("\\", "/" , $baseDir) ;
$path .='/vendor/database/Migration.php' ;

require $path ;

use database\migration\Migration as Migration ;

//migation template
class CreateTagTable extends Migration{
	public $table_name = 'tagsTest' ;

	public function up(){
		#code goes here...
		$this->create($this->table_name , '[
			{
				"columnName":"id" ,
				"attributes":["INT(6)" ,"NOT NULL" ,"AUTO_INCREMENT" , "PRIMARY KEY"] 
			} ,

			{
				"columnName":"tagName" , 
				"attributes" :["VARCHAR(20)" ,"NOT NULL"]
			} ,
			{
				"columnName":"testField" ,
				"attributes":["VARCHAR(50)" ,"NOT NULL" ]
			}
		]');
	}

	public function down(){
		#code goes here...
	}
}

?>