<?php 
$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

$path = str_replace("\\", "/" , $baseDir) ;
$path .='/vendor/database/Migration.php' ;

require $path ;

use database\migration\Migration as Migration ;
//migation template
class CreateTagTable extends Migration{
	public $table_name = 'tags' ;

	public function up(){
		#code goes here...
		$this->create($this->table_name , function(){
			#$table->addColumn('coloumn name' , array() );
			echo 'function evoked...' ;
		});
	}

	public function down(){
		#code goes here...
	}
}

?>