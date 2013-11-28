<?php

namespace Symfasize\Bundle\ConfigurationBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{

    protected function configure()
    {
        $this
            ->setName('test:test')
            ->addArgument('test');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $str = "/var/www/folder.com_v3/app/storage/photos/tmp/cmaRMi3IFI.jpg";
        var_dump(pathinfo($str));

        $test = $input->getArgument('test');

        print_r($test);
    }

} 