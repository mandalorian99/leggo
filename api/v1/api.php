<?php 
# API entry poin
# include supporting api class

require_once('feeds.php') ;

# Request from the same server don't have HTTP_ORIGIN 
# If $_SERVER['HTTP_ORIGIN'] not found , add it manually
if( !array_key_exists('HTTP_ORIGIN', $_SERVER) ){
	$_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'] ;
}

# handling error and exception 
try{
	$feeds = new feeds($_REQUEST['request'] , $_SERVER['HTTP_ORIGIN'] ) ;
	$data = $feeds->processAPI() ;
	echo $data ;

}catch(Exception $e){
	$error = json_encode( Array(
		'error' => $e->getMessage() 
	)) ;

	echo $error ;
}

?>