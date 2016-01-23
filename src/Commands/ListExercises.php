<?php


namespace Jehaby\Exesise\Commands;


use Jehaby\Exesise\Repositories\ExercisesRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ListExercises extends Command
{
    /**
     * @var ExercisesRepository
     */
    private $repository;

    /**
     * @var Table
     */
    private $table;

    /**
     * ListExercises constructor.
     * @param ExercisesRepository $repository
     * @param Table $table
     */
    public function __construct(ExercisesRepository $repository, Table $table)
    {
        parent::__construct();
        $this->repository = $repository;
        $this->table = $table;
    }

    protected function configure()
    {
        $this
            ->setName('exercise:list')
            ->setDescription('Lists all exercises')
            ->setAliases(['el'])
        ;

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->table->setHeaders(['id', 'Title', 'Description']);

        foreach ($this->repository->getAll() as $exercise) {
            $this->table->addRow([$exercise->getId(), $exercise->getTitle(), $exercise->getDescription()]);
        }

        $this->table->render();
    }


}