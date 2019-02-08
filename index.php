<?php 
/*
 * Entery point of application
 */
$root = __dir__.'/' ;

function __autoload( $className ){
	global $root ;
	if( file_exists( $root.'vendor/route/'.$className.'.php' ) ){

		require_once($root.'vendor/route/'.$className.'.php') ;

	}else if( file_exists( $root.'vendor/app/controller/'.$className.'.php' ) ){
		require_once($root.'vendor/app/controller/'.$className.'.php') ;
	}else if(file_exists($root.'vendor/app/model/'.$className.'.php') ){
		require_once($root.'vendor/app/model/'.$className.'.php') ;
	}else{
		require_once($root.'vendor/database/'.$className.'.php') ;
	}
}//EOF


require $root.'/vendor/route/web.php' ;

?>
