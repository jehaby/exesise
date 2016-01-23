<?php


namespace Jehaby\Exesise\Commands;


use Aura\Sql\Exception;
use Symfony\Component\Console\Command\Command;
use Jehaby\Exesise\Repositories\ExercisesRepository;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RemoveExercise extends Command
{

    /**
     * @var ExercisesRepository
     */
    private $repository;

    /**
     * AddExercise constructor.
     * @param ExercisesRepository $repository
     */
    public function __construct(ExercisesRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    protected function configure()
    {
        $this
            ->setName('exercise:remove')
            ->setDescription('Removes an exercise')
            ->setAliases(['er'])
            ->addArgument('id', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->repository->destroy($input->getArgument('id'));
        } catch (Exception $e) {
            $output->writeln('Something went wrong');
        }
    }




}