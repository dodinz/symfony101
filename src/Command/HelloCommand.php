<?php
/**
 * Created by PhpStorm.
 * User: Dindo
 * Date: 6/26/2018
 * Time: 9:52 AM
 */

namespace App\Command;

use App\Service\Greeting;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class HelloCommand extends Command
{
    /**
       @var Greeting
     */
    private $greeting;

    public function __construct(Greeting $name = null)
    {
        $this->greeting = $name;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('app:say-hello')
            ->setDescription('Says hello to the user' )
            ->addArgument('name', InputArgument::REQUIRED );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $output->writeln([
            'Hello from the app',
            '=========================',
            ''
        ]);
        $output->writeln( $this->greeting->greet($name) );
    }
}