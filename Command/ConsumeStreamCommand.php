<?php

/*
 * Mineur/twitter-stream-api-bundle package
 *
 * Feel free to contribute!
 *
 * @license MIT
 * @author alexhoma <alexcm.14@gmail.com>
 */

namespace Mineur\TwitterStreamApiBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

use Mineur\TwitterStreamApi\Model\Tweet;
use Mineur\TwitterStreamApi\PublicStream;

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
            ->setDescription('Prompts a stream output in the console')
            ->setHelp('This command allows you to start an infinite loop to consume the Twitter Stream Api')
            ->addArgument(
                'keywords',
                InputArgument::REQUIRED,
                'The keywords to track.'
            )
            ->addArgument(
                'language',
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
        $output->writeln(
            AsciiArt::generate()
        );
    
        $output->writeln([
            '<comment>Keywords: </comment>',
            $this->generateFormattedList(
                $input->getArgument('keywords')
            ),
            '<comment>Language: </comment>',
            $this->generateFormattedList(
                $input->getArgument('language')
            ),
            '<comment>User ID:  </comment>',
            $this->generateFormattedList(
                $input->getArgument('userId')
            ),
            '',
            'Consuming stream ...',
            '',
            '',
        ]);
        
        /** @var PublicStream $publicStream */
        $publicStream = $this
            ->getContainer()
            ->get('twitter_stream_api_consumer')
        ;
        $publicStream
            ->listenFor([
                $input->getArgument('keywords')
            ])
            ->setLanguage(
                $input->getArgument('language')
            )
            ->tweetedBy([
                $input->getArgument('userId')
            ])
            ->do( function(Tweet $tweet) {
                dump($tweet);
            });
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
    
    /**
     * @param $items
     * @return string
     */
    private function generateFormattedList($items): string
    {
        if (empty($items)) {
            return ' ~ ~ ~' . PHP_EOL;
        }
        $itemsArray = explode(',', $items);
        $itemsList = '';
        
        foreach ($itemsArray as $item) {
            $itemsList .= ' - ' . trim($item) . PHP_EOL;
        }
        
        return $itemsList;
    }
}