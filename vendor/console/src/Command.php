<?php 
namespace Console;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use console\MakeCommand as Make;
use console\MakeMigration;
use console\database as test;
require 'test.php';
/**
 * Author: Chidume Nnamdi <kurtwanger40@gmail.com>
 * Extended by Mahendra choudhary <mahendrachoudhary1156@gmail.com
 */
class Command extends SymfonyCommand
{
    
    /**
     * Functions which called by the class which is evoked based on the user input
     * So here you have to make a function which acutally display output to console
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function greetUser(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $output -> writeln([
            '====**** User Greetings Console App ****====',
            '==========================================',
            '',
        ]);
        $obj = new test();
        $obj->demo();
        //print_r($input) ;
        echo"your optional attribute==".$input->getOption('attribute') ;
        
        // outputs a message without adding a "\n" at the end of the line
        $output -> write($this -> getGreeting() .', '. $input -> getArgument('username'));
    }
    private function getGreeting()
    {
        /* This sets the $time variable to the current hour in the 24 hour clock format */
        $time = date("H");
        /* Set the $timezone variable to become the current timezone */
        $timezone = date("e");
        /* If the time is less than 1200 hours, show good morning */
        if ($time < "12") {
            return "Good morning";
        } else
        /* If the time is grater than or equal to 1200 hours, but less than 1700 hours, so good afternoon */
        if ($time >= "12" && $time < "17") {
            return "Good afternoon";
        } else
        /* Should the time be between or equal to 1700 and 1900 hours, show good evening */
        if ($time >= "17" && $time < "19") {
            return "Good evening";
        } else
        /* Finally, show good night if the time is greater than or equal to 1900 hours */
        if ($time >= "19") {
            return "Good night";
        }        
    }

    /**
     * Make command function 
     */

    protected function makeController(InputInterface $input, OutputInterface $output){
        $output -> writeln([
            '=======Creating controller=======',
        ]);
        Make::createFile(
            $input->getArgument('command') , 
            $input->getArgument('controllerName')
         ); 
        
        // outputs a message without adding a "\n" at the end of the line
        $output -> write("hello controller test test..");

    }

    /**
     * make model function 
     */
    protected function makeModel(InputInterface $input, OutputInterface $output){
        $output->writeln(['=======make model========',]);
        # calling function from base class makeCommand
        Make::createFile(
            $input->getArgument('command')  , 
            $input->getArgument('modelName') 
        );

        $output->write("model created successfully.....") ;
    }

    /**
     * Make view function 
     * evoked by MakeView Class
     */

    protected function makeView(InputInterface $input , OutputInterface $output){
        $output->writeln(['======making a view=====',]);

        Make::createFile(
            $input->getArgument('command') , 
            $input->getArgument('viewName')
        );

        $output->write('View created successfully...');
    }

    /**
     * Make a migration
     * evoked by MakeMigration
     */
    protected function makeMigration(InputInterface $input , OutputInterface $output){

        $output->writeln(['======making a migration=====']);
        Make::createMigrationFile(
            $input->getArgument('command') ,
            $input->getArgument('migrationClassName') ,
            $input->getOption('tableName') 
        );
        $output->writeln(['your migration file is created successfully....']) ;
    }

    /**
     * Migrate a migration basend on migrationClassName
     * evoked by Migrate class
     */
    protected function migrate(InputInterface $input , OutputInterface $output){
        $output->writeln(['====== Migrating your migration======']);
        
        Make::call_migration_script(
            $input->getArgument('command') ,
            $input->getArgument('migrationClassName') 
        );
        
    }


    /**
     * Make seeder command function 
     */

    protected function makeSeeder(InputInterface $input, OutputInterface $output){
        $output -> writeln([
            '=======Creating a seeder class=======',
        ]);

        Make::createSeederFile(
            $input->getArgument('command') , 
            $input->getArgument('seederClassName') ,
            $input->getOption('rows') 
         ); 
        
        // outputs a message without adding a "\n" at the end of the line
        $output -> write("hello controller test test..");

    }

}
