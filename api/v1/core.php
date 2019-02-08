<?php 
# Core of the API
# Here URI is segregated and differented as endpoint,verb,argument,method etc 
# Contains supporting function 

abstract class API{
    /**
     * Property: method
     * The HTTP method this request was made in, either GET, POST, PUT or DELETE
     */
    protected $method = '';
    /**
     * Property: endpoint
     * The Model requested in the URI. eg: /files
     */
    protected $endpoint = '';
    /**
     * Property: verb
     * An optional additional descriptor about the endpoint, used for things that can
     * not be handled by the basic methods. eg: /files/process
     */
    protected $verb = '';
    /**
     * Property: args
     * Any additional URI components after the endpoint and verb have been removed, in our
     * case, an integer ID for the resource. eg: /<endpoint>/<verb>/<arg0>/<arg1>
     * or /<endpoint>/<arg0>
     */
    protected $args = Array();
    /**
     * Property: file
     * Stores the input of the PUT request
     */
     protected $file = Null;

    /**
     * Constructor: __construct
     * Allow for CORS, assemble and pre-process the data
     */

    public function __construct($request){
    	# header to format response as json
    	header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");

        # processing URI to divide and get arguments
        $this->args = explode( '/' , rtrim($request , '/') ) ;

        # We assuming first element in the args array to be endpoint
        # so using array_shift method we get the first element of the array 
        $this->endpoint = array_shift($this->args) ;

        # checking if second element in args array is verb or not 
        # if in URI /<endpoin>/<verb>/<argument>/ second element is numeric 
        # than it is not verb 

        if( array_key_exists(0, $this->args) && !is_numeric($this->args[0])){
        	# since first element of args arrray is not a numberic value 
        	# then if must be a verb only 
        	# so again we shift the args stack to get our verb 
        	$this->verb = array_shift($this->args) ;
        }

        # Finding what type of request method 
        # $_SERVER['REQUEST_METHOD'] super global array 
        $this->method = $_SERVER['REQUEST_METHOD'] ;
        /**
         *  PUT and DELETE request come along POST , so to determine them
         *  We use HTTP_X_HTTP_METHOD constraint  
         */

        if($this->method == 'POST' && array_key_exists('HTTP_X_HTTP_METHOD', $_SERVER) ){
        	if($_SERVER['HTTP_X_HTTP_METHOD'] == 'DELETE')
        		$this->method = 'DELETE' ;
        	elseif($_SERVER['HTTP_X_HTTP_METHOD'] == 'PUT')
        		$this->method = 'PUT' ;
        	else
        		throw new Exception('unexpected request header') ;
        }

        # Now method is defined , we can switch to filter the incoming request 
        switch ($this->method) {
        	case 'DELETE':        		
        	case 'POST':
        	#echo '# post method...' ;
        		$this->request = $this->_cleanInputs($_POST);
        		break;
        	case 'GET':
        	#echo '# get method...' ;
        		$this->request = $this->_cleanInputs($_GET);
        		break;
        	case 'PUT':
        		$this->request = $this->_cleanInputs($_GET);
            	$this->file = file_get_contents("php://input");
        		break;
        	default:
        		$this->_response('Invalid Method', 405);
        		break;
        }


    }//EOF

    /**
     *  This function evoke function based on endpoint
     */
    public function processAPI(){
    	# checking if any method for required endpoint exists 
    	if( method_exists($this, $this->endpoint) ){
    		$func = $this->endpoint ;
    		# evoke endpoint function and return as json ecoded response 
    		return $this->_response( $this->$func( $this->args ) ) ;
    	}

    	return $this->_response('No Endpoint: '.$this->endpoint, 404) ;
    }

    /**
     * cleaning input's 
     */

    private function _cleanInputs($data) {
        $clean_input = Array();

        if (is_array($data)) {
            foreach ($data as $k => $v) {
                $clean_input[$k] = $this->_cleanInputs($v);
            }
        } else {
            $clean_input = trim(strip_tags($data));
        }
        return $clean_input;
    }//EOF

    /**
     * Return the status code with response along with the json encoded data 
     */

    private function _response($data , $status=200){
    	header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status) ) ; 
    	#echo '#encoding data into json...';
    	return json_encode($data) ;
    }//EOF

    /**
     * return the error code when status code is supplied to fucntion
     */

    private function _requestStatus($code){
    	$status = array(
    		200 => 'OK',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
    	) ;
    }//EOF

}//EOC

?>