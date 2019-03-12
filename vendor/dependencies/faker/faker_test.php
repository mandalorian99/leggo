<?php

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

$path = str_replace("\\", "/" , $baseDir) ;
echo $path ;

/**
 * including autoload file of faker 
 * this autoload required faker pacakge class into the current script
 */

if(file_exists( $path.'/dependencies/faker/autoload.php' )){
	echo 'file included successfully...' ;

	require $path.'/dependencies/faker/autoload.php' ;
}else{
	echo 'file not exits...' ;
}


#faker object to work with faker liberary
$faker = new Faker\Generator() ;

$faker->addProvider(new \Faker\Provider\Book($faker));
print_r($faker) ;
?>