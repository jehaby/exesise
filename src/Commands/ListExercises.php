<?php


namespace Jehaby\Exesise\Commands;


use Jehaby\Exesise\Repositories\ExercisesRepository;
use Symfony\Component\Console\Command\Command;
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
        $this->repository = $repository;
    }

    public function configure()
    {
        $this
            ->setName('ex:list')
            ->setAliases(['le'])
            ->setDefinition('Outputs all exercises');
    }


    public function execute(OutputInterface $output)
    {
        $output->writeln();
    }

}