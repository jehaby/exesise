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
    public function getAll()
    {
        $exercises = [];

        foreach ($this->pdo->fetchAll('SELECT id, title, description FROM exercises') as $data) {
            $exercises[] = new Exercise($data['id'], $data['title'], $data['description']);
        }

        return $exercises;
    }

    /**
     * @param string $title
     * @param string $description
     *
     */
    public function add($title, $description)
    {
        $this->pdo->perform(
            'INSERT INTO exercises(title, description) VALUES (:title, :description)',
            ['title' => $title, 'description' => $description]
        );
    }

    /**
     * @param int $id
     */
    public function destroy($id)
    {
        $this->pdo->perform('DELETE FROM exercises WHERE id = :id', ['id' => $id]);
    }

}