<?php


namespace Jehaby\Exesise\Commands;


use Aura\Sql\Exception;
use Symfony\Component\Console\Command\Command;
use Jehaby\Exesise\Repositories\ExercisesRepository;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddExercise extends Command
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
            ->setName('exercise:add')
            ->setDescription('Adds an exercise')
            ->setAliases(['ea'])
            ->addArgument('title', InputArgument::REQUIRED)
            ->addArgument('description', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $this->repository->add($input->getArgument('title'), $input->getArgument('description'));
        } catch (Exception $e) {
            $output->writeln('Something went wrong');
        }
    }




}