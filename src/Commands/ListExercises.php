<?php


namespace Jehaby\Exesise\Commands;


use Jehaby\Exesise\Repositories\ExercisesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListExercises extends Command
{
    /**
     * @var ExercisesRepository
     */
    private $repository;

    /**
     * ListExercises constructor.
     * @param ExercisesRepository $repository
     */
    public function __construct(ExercisesRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function configure()
    {
        $this
            ->setName('ex:list')
            ->setAliases(['le']);
        //            ->setDefinition(['Outputs all exercises']);
    }


    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln();
    }

}