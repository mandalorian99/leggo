<?php 
# This is a base controller 
# Its functionality can be accessed by other controllers 

class controller{
	public static function view($viewName){
		require $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/app/view/'.$viewName.'.php' ;
		
	}
}

?>