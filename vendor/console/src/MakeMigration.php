<?php 
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\MakeCommand;

/**
 * Class: MakeMigrations
 * This class lets  you create a migration file into migrations directory
 * Migration work as a version control for your database 
 * Using migration you can anytime change schema of a database table with 
 * running any sql command 
 */

class MakeMigration extends MakeCommand{
	public function configure()
    {
        $this->setName('make:migration')->setDescription('Make a migration ')
             ->setHelp('This command let you create a migration into migration dir')
             ->addArgument(
             	'migrationClassName' ,
             	 InputArgument::REQUIRED,
             	 'name of migration class'
               )
             -> addOption(
                'tableName' ,
                't' ,
                InputOption::VALUE_OPTIONAL ,
				'you can speficy the table name using -t attribute'
              );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        #$this -> greetUser($input, $output);
        $this->makeMigration($input , $output) ;
    }
}

?>