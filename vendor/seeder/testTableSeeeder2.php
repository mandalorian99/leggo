<?php 

/**
 * including Seeder.php
 */
$vendorDir = dirname(dirname(__FILE__));

$path = str_replace("\\", "/" , $vendorDir) ;
echo 'path='.$path ;

if(file_exists( $path.'/database/Seeder.php' )){
	echo 'file included successfully...' ;

	require $path.'/database/Seeder.php' ;
}else{
	echo 'file not exits...' ;
}

use database\seeder\Seeder as Seeder ;

class testTableSeeeder2 extends Seeder{

	public function factory(){
		
		/**
		 * Define your faker data structure 
		 * column name followed by the type of data you want in it 
		 */
		$this->define('YOUR_TABLE_NAME' , '' , function(){
			$faker = $this->faker ;
			return [
				'name' =>$faker->name ,
				'email'=>$faker->email 
				
				] ;
		}) ;
	}

	public function test1(){
		echo 'hello test test' ;
	}
}

#$obj = new UserSeeder ;
#$obj->factory() ;
?>