<?php

namespace Mineur\TwitterStreamApiBundle\Command;

use Mineur\TwitterStreamApi\PublicStream;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Class CreateUserCommand
 * @package Mineur\TwitterStreamApiBundle\Command
 */
class ConsumeStreamCommand extends Command
{
    use ContainerAwareTrait;

    protected function configure()
    {
        $this
            ->setName('mineur:twitter-stream:consume')
            ->setDescription('Starts to consume the Twitter Streaming Api')
            ->setHelp('This command allows you to start an infinite loop to consume the Twitter Stream Api')
            ->addArgument(
                'keywords',
                InputArgument::REQUIRED,
                'The keywords to track.'
            )
            ->addArgument(
                'locale',
                InputArgument::OPTIONAL,
                'The tweet language.'
            )
            ->addArgument(
                'userId',
                InputArgument::OPTIONAL,
                'The user id to track.'
            )
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    )
    {
        $output->writeln([
            'Mineur Stream API',
            '==================',
            '',
        ]);

        $output->writeln(
            'Keywords (comma separated): '.
            $input->getArgument('keywords')
        );
        $output->writeln(
            'Locale (empty by default): '.
            $input->getArgument('locale')
        );
        $output->writeln(
            'User ID (empty by default): '.
            $input->getArgument('userId')
        );

        /** @var PublicStream $publicStream */
        $publicStream = $this
            ->getContainer()
            ->get('twitter_stream_api_consumer');
        $publicStream
            ->listenFor([
                $input->getArgument('keywords')
            ]);
    }

    /**
     * Get service container
     *
     * @return mixed
     */
    private function getContainer()
    {
        return $this
            ->getApplication()
            ->getKernel()
            ->getContainer();
    }
}