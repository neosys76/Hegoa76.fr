<?php

namespace Libertribes\Bundle\WorldBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Finder\Finder;
use Libertribes\Component\Image\Image;
use Libertribes\Component\World\Cartographer;
use Libertribes\Component\World\World;
use Libertribes\Component\World\TilePanel;

class MakeMapCommand extends ContainerAwareCommand
{
    protected
    function configure() {
        $this
            ->setName('libertribes:make:map')
            ->setDescription('Map the word.')
            ->addOption('panel', null, InputOption::VALUE_REQUIRED, 'TilePanel name.')
            ->setHelp(<<<EOF
The <info>libertribes:make:map</info> command make map from database.

<info>php app/console libertribes:make:map --panel="16x16"</info>

EOF
            )
        ;
    }
    
    protected
    function execute(InputInterface $input, OutputInterface $output) {
        $panel_name = $input->getOption('panel');
        if (is_null($panel_name)) {
            throw new \InvalidArgumentException();
        }
        $panels = $this->getContainer()->get('libertribes_world.panels');
        $panel = $panels->getPanel($panel_name);
        if (is_null($panel)) {
            throw new \InvalidArgumentException();
        }
        
        try {
            $cartographer = $this->getContainer()->get('libertribes_world.cartographer');

            $cartographer->map($panel);
        } catch (\Exception $e) {
            echo $e;
        }

    }
}