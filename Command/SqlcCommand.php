<?php

namespace Omedia\SqlCommandsBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SqlcCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('db:sqlc')
            ->setDescription('Generates and runs mysql command to connect to database using parameters, defined in parameters.yml')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $database_host = $this->getContainer()->getParameter('database_host');
        $database_port = $this->getContainer()->getParameter('database_port');
        $database_name = $this->getContainer()->getParameter('database_name');
        $database_user = $this->getContainer()->getParameter('database_user');
        $database_password = $this->getContainer()->getParameter('database_password');

        $command = sprintf('mysql -u%s -p%s -h%s', $database_user, $database_password, $database_host);
        if ($database_port) {
            $command .= sprintf(' --port=%s', $database_port);
        }
        $command .= sprintf(' %s', $database_name);

        $output->writeln('<info>Executing:</info> '.$command);

        $process = proc_open($command, array(0 => STDIN, 1 => STDOUT, 2 => STDERR), $pipes);
        proc_get_status($process);
        proc_close($process);
    }

}
