<?php 
namespace Console;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Console\MakeCommand;

/**
 * Class to make models in model directory 
 */

class MakeModel extends MakeCommand{
	public function configure()
    {
        $this->setName('make:model')->setDescription('Make model class')
             ->setHelp('This command let you create a model')
             ->addArgument('modelName',InputArgument::REQUIRED,'name of model class')->addOption(
                        'attribute' ,
                        'm' ,
                        InputOption::VALUE_OPTIONAL ,
                        '-m creates a migration file in migration folder'
                    );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        #$this -> greetUser($input, $output);
        $this->makeModel($input , $output) ;
    }

}
?>