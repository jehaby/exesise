<?php


namespace Jehaby\Exesise\Repositories;


use Aura\Sql\ExtendedPdoInterface;
use Jehaby\Exesise\Exercise;

class ExercisesRepository
{

    /**
     * @var ExtendedPdoInterface
     */
    private $pdo;


    public function __construct(ExtendedPdoInterface $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * @return Exercise[]
     */
    public function getAllExercises()
    {
        $exercises = [];

        foreach ($this->pdo->fetchAll('SELECT title, description FROM exercises') as $data) {
            $exercises[] = new Exercise($data['title'], $data['description']);
        }

        return $exercises;
    }




}