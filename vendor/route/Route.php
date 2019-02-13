<?php 
# Route class handles all the web routes.
# if web route is valid then call its controller 
# else show error message

class Route{

 	public static $validRoute = array() ;
 	

 	public function __construct(){
 		echo "<br/>who called me ?" ;
 	}

 	public static function set( $route , $function ){

 		self::$validRoute[] = $route ;
 		//echo '<br/>incoming url = '.$_GET['url'] ;
 		#print_r(self::$validRoute) ;

 		if( $_GET['url'] == $route){
 			$function->__invoke() ;	
 			return ;
 		}

 		//if(!in_array($_GET['url'], self::$validRoute))
 		//	die('<h2>you silly human</h2>') ;

 		
 	}//EOF

 	public static function get($uri , $params){
 		list($controllerName , $funcName) = explode('@', $params) ;
 		self::$validRoute[] = $uri ;

 		if( $_GET['url'] == $uri){
 			$controller = new $controllerName ;
 			# function of respective controller evoked
 			$controller->$funcName() ;	

 			return ;
 		}else{
 			throw new Exception("no uri found", 1);
 			
 		}
 	}

 	public function test(){
 		echo"success";
 	}
}

?>