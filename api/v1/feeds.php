<?php 
require 'core.php' ;
require 'ApiKey.auth.php' ;
require $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/app/controller/BusStopController.php' ;

class feeds extends API{
protected $User;

    public function __construct($request, $origin) {

       parent::__construct($request);  
       
       //authenticate key logic goes here 
       $apikey = new ApiKeyAuth() ;

       /**
        * logic to validate api key and throw exceptions
        */
       //print_r($this->request);
       if (!array_key_exists('apikey', $this->request)) {       	    
            throw new Exception('No API Key provided');
            
        } else if ( !$apikey->verifyKey($this->request['apikey'], $origin ) ) {

            throw new Exception('Invalid API Key');

        } else if (array_key_exists('token', $this->request) && !$User->get('token', $this->request['token'])) {
            throw new Exception('Invalid User Token');
        }
    }

    # Endpoint:busStops 
    public function busStops($arg){
    	#echo '# getting bus stops coords ....' ;
    	#var_dump($arg) ;
    	$sample = array(
    		'id' 	=> 1 ,
    		'name'  => 'mahendra' ,
    		'trade' => 'software'
    	);
    	return $sample ;
    }

    # endpoint:locate
    public function locate($arg){
      $latLongs = BusStopController::get_all_bus_stops_coords() ;
      return $latLongs ;
    }

    /**
     * function to authenticate api key 
     */

}//EOC

?>