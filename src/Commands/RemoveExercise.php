<?php


namespace Jehaby\Exesise\Commands;


use Aura\Sql\Exception;
use Psr\Log\LoggerInterface;
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
     * @var LoggerInterface
     */
    private $logger;

    /**
     * AddExercise constructor.
     * @param ExercisesRepository $repository
     * @param LoggerInterface $logger
     */
    public function __construct(ExercisesRepository $repository, LoggerInterface $logger)
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
            $this->logger->
            $output->writeln('Something went wrong');
        }
    }




}