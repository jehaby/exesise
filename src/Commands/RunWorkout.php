<?php


namespace Jehaby\Exesise\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\QuestionHelper;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Question\ConfirmationQuestion;


class RunWorkout extends Command
{

    protected function configure()
    {
        $this
            ->setName('workout:run')
            ->setAliases(['wr'])
            ->setDescription('Runs current workout')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $progress = new ProgressBar($output, 5);

        /** @var  $helper QuestionHelper */
        $helper = $this->getHelper('question');
        $question = new ConfirmationQuestion('Continute?');

        $progress->start();

        $i = 0;

        while ($i < 5) {
            if (!$helper->ask($input, $output, $question)) {
                break;
            }
            $progress->advance();
            $output->writeln(" \n Ok! " . $i );
            $i++;
        }

        $output->writeln("i = " . $i);
        $output->writeln(($i > 4) ? 'Good job!' : 'Fooooo!');

    }


}