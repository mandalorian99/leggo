<?php 
namespace database\seeder ;

/**
 * Including the autoload file of faker pacakage
 * this logic will be replaced in future version 
 */

$vendorDir = dirname(dirname(__FILE__));

$path = str_replace("\\", "/" , $vendorDir) ;

/**
 * including autoload file of faker 
 * this autoload required faker pacakge class into the current script
 */

if(file_exists( $path.'/dependencies/faker/autoload.php' )){
	echo 'faker file included successfully...' ;

	require $path.'/dependencies/faker/autoload.php' ;
	require $path.'/database/database.php' ;
}else{
	echo 'file not exits...' ;
}

use database\Database as Database ;
/**
 * Class : Seeder 
 * Role  : Contain function used by its child classes to define data 
 * and push this data to the table 
 * Dependency : faker liberary used by this class 
 */
class Seeder extends Database{
	public $faker  ;
	public $test ='access' ;
	public $db ;

	# Now every class extending Seeder can accessd to faker object
	public function __construct(){
		$this->faker = \Faker\Factory::create();
		$this->db = new Database() ;
		
	}

	protected function define($tableName , $row , $function){
		$data = array() ;

		echo $tableName ;
		echo $row ; 

		#function stored in variable
		$func = $function ;
		# function when eveoked return new set of data every time ,as user defined 
		for($i=0 ; $i<$row ; $i++){
			$data[$i] = $func->__invoke() ;
		}
			
			#print_r($data) ;
			
		# inserting data into database 
		$this->insertFakerData2DB($tableName , $data ) ;
	}

	public function insertFakerData2DB($tableName , $data){
		echo "********************inserting data into database****************\n" ;
		#print_r($data) ;
		# evoking database connection here 
   		 $value = array() ;
   		 $columnNames = array() ;
    
   		 # retriveing data arrays keys . These keys are column names as well 
   		 $columnNames = array_keys( $data[0] ) ;
   		 print_r($columnNames) ;
   		 
   		 $sql = "INSERT INTO ".$tableName." ( ".implode(',', $columnNames)." )"." VALUES" ;

   		 if( is_array($data) ){
        	 //parse it 
       		 foreach($data as $key =>$row){
         		   $value = NULL ;
          		   $value[] = "'".implode("','" , $row)."'" ;            	
            	   $sql .= "(".implode(',' , $value). ") ,";            
       	     }

       		 $query = substr( $sql , 0 , -2)  ;

       		 echo $query ;    		 
       		 
        }

		# exception handling , in case users fucked up 
			$this->db->query($query) ;
			$this->db->execute() ;	
		
		
	}

}



?>