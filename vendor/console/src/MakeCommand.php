<?php 
namespace Console;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\Command;



/**
 * Author: Mahendra Choudhary <mahendrachoudhary1156@gmail.com>
 * This class inherted by the MakeModel and MakeController class
 * It contains the supporting function for both classess..
 */
class MakeCommand extends Command
{
   public $templatePath='C:/xampp/htdocs/live tracking/vendor/console/src/';
   public $migrationDirPath='C:/xampp/htdocs/live tracking/vendor/migrations';
    /**
     * function to create a model or a controller with predefined code
     */
    public function createFile($command , $filename){
        $dir = explode(':' , $command ) ;

        $path='C:/xampp/htdocs/live tracking/vendor/app/'.$dir[1].'/'.$filename.'.php' ;
        $this->templatePath .=$dir[1].'.txt' ;

        $template = file($this->templatePath) ;
        
        $file = fopen($path ,'w+') ; 

        file_put_contents($path , $template) ;   
        
        
        
    }

    public function createMigrationFile($command , $filename ,$option){
    	$tags = array(
    		'YOUR_CLASS_NAME' ,
    		'YOUR_TABLE_NAME'
    	);
    	$replace = array(
    		$filename  ,	
    		$option 
    	);

        $dir = explode(':' , $command ) ;

        $path='C:/xampp/htdocs/live tracking/vendor/'.str_replace('migration', 'migrations', $dir[1]).'/'.$filename.'.php' ;

        $this->templatePath .=$dir[1].'.php' ;

        $template = file($this->templatePath) ;

        #print_r(str_replace($tags, $replace, $template)) ;
        #die("-------------------");
        $file = fopen($path ,'w+') ; 

        file_put_contents($path , str_replace($tags, $replace, $template)) ;   
        
        
        
    }

    /**
     * Migrate a migration class
     */

    public function call_migration_script($command , $className){
        $dir = str_replace('migrate', 'migrations', $command);

        # Fetching root direcotory 
        $vendorDir = dirname(dirname(__FILE__));
        $baseDir = dirname($vendorDir);
        $path = str_replace("\\", "/" , $baseDir) ;

        # className and file name are similar 
        $path .='/'.$dir.'/'.$className.'.php' ;

        # throwing expection if no class found
        if( !file_exists($path) )
            throw new \Exception("$className not found...");

        #including migration/MigrationClassName file 
        require $path ;

        # intilizing object of MigrationClassName class
        # to call up function of MigrationClassName class
        $obj = new $className ;
        $obj->up();

        
        
        
    }
}

?>