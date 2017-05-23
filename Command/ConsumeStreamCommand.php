<?php

namespace Mineur\TwitterStreamApiBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateUserCommand
 * @package Mineur\TwitterStreamApiBundle\Command
 */
class ConsumeStreamCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('mineur:twitter-stream:consume')
            ->setDescription('Starts to consume the Twitter Streaming Api')
            ->setHelp('This command allows you to start an infinite loop to consume the Twitter Stream Api')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^',
            '>        Mineur Stream API        <',
            '^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^',
            '',
        ]);

        $output->writeln('Keywords (comma separated): '.$input->getArgument('keywords'));
        $output->writeln('Locale (empty by default): '.$input->getArgument('locale'));
        $output->writeln('User ID (empty by default): '.$input->getArgument('userId'));
    }
}