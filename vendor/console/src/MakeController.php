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
class MakeController extends MakeCommand
{
    
    public function configure()
    {
        $this->setName('make:controller')->setDescription('Make controller class')
             ->setHelp('This command let you create a controller')
             ->addArgument('controllerName',InputArgument::REQUIRED,'name of controller class');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        #$this -> greetUser($input, $output);
        $this->makeController($input , $output) ;
    }
}
?>