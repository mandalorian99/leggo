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

class Migrate extends MakeCommand{
	public function configure()
    {
        $this->setName('migrate')->setDescription('migrate a migration ')
             ->setHelp('This command let you migrate your migration...')
             ->addArgument(
             	'migrationClassName' ,
             	 InputArgument::REQUIRED,
             	 'name of migration class'
               );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        #$this -> greetUser($input, $output);
        $this->migrate($input , $output) ;
    }
}

?>