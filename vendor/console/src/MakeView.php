<?php 
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\MakeCommand;

/**
 * Class to make view
 */
class MakeView extends MakeCommand
{
    
    public function configure()
    {
        $this->setName('make:view')->setDescription('Make view class')
             ->setHelp('This command let you create a view')
             ->addArgument('viewName',InputArgument::REQUIRED,'name of view class');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $this->makeView($input , $output) ;
    }
}
?>