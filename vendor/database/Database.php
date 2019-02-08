<?php 
/**
 * Mysql driver : It contain all the common functionalities which help to connect ,disconnect to the 
 * database . 
 * It will uses PDO extension to query sql statemtments 
 */
require $_SERVER['DOCUMENT_ROOT'].'/live tracking/vendor/config/credentials.php'  ;
class Database{
	private $host     = DB_HOST		  ;
	private $dbname   = DB_NAME       ;
	private $username = DB_USER       ;
	private $passwd = DB_PASS         ;

	private $handler    ;
	private $error      ;

	private $statement  ;


	public function __construct(){
		# connecting to database
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbname ;
		$options = [
            PDO::ATTR_PERSISTENT => true,  
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        # handling any connection error
        try{
        	$this->handler = new PDO($dsn , $this->username , $this->passwd , $options) ;
        }catch(PDOException $e){
        	$this->error = $e->getMessage() ;
        	#echo $this->error ;
        	# code for logging error to file ...
        }
	}

	/**
	 * prepare a statement
	 */
	public function query($query){
		$this->statement = $this->handler->prepare($query) ;
		#echo'executed' ;
	}

	/**
	 * Execute a prepared statement 
	 */
	public function execute(){
		try{
			#echo 'exectuteed...' ;
			return $this->statement->execute() ;
		}catch(PDOException $e){
			$this->error = $e->getMessage() ;
			echo $this->error ;
		}
	}

	/**
	 * Bind variable to the proper type .Allows for 
	 * integer ,strings ,boolean and null values 
	 */
	public function bind( $params , $value , $type ){
		if( is_null($type) ){
			switch (true) {
				case is_int($value):
					$type = PDO::PARAM_INT ;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL ;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL ;
					break;
				
				default:
					$type = PDO::PARAM_STR ;
					break;
			}
		}
		$this->statement->bind( $params , $value , $type ) ;
	}

	/**
	 * Fetch a result as a single row 
	 */
	public function result(){
		$this->execute() ;
		return $this->statement->fetch(PDO::FETCH_ASSOC) ;
	}

	/**
	 * Fetch all rows as result 
	 */
	public function resultset(){
		$this->execute() ;
		return $this->statement->fetchAll(PDO::FETCH_ASSOC) ;
	}
}
?>