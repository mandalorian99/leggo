<?php 
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\MakeCommand;

/**
 * Class to make controllers
 */
class MakeSeeder extends MakeCommand
{
    
    public function configure()
    {
        $this->setName('make:seeder')->setDescription('Make a seeder ')
             ->setHelp('This command let you create a seeder into seeder dir')
             ->addArgument(
                'seederClassName' ,
                 InputArgument::REQUIRED,
                 'name of seeder class'
               )
             -> addOption(
                'rows' ,
                'r' ,
                InputOption::VALUE_OPTIONAL ,
                'you can speficy the no of rows using -t attribute'
              );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        #$this -> greetUser($input, $output);
        $this->makeSeeder($input , $output) ;
    }
}
?>