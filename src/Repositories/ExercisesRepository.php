<?php


namespace Jehaby\Exesise\Repositories;

use Doctrine\DBAL\Connection;
use Jehaby\Exesise\Exercise;
use Psr\Log\LoggerInterface;

class ExercisesRepository
{

    /**
     * @var Connection
     */
    private $connection;

    /**
     * @var LoggerInterface
     */
    private $logger;


    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        $this->connection = $connection;
        $this->logger = $logger;
    }

    /**
     * @return Exercise[]
     */
    public function getAll()
    {
        $exercises = [];

        foreach ($this->connection->fetchAll('SELECT id, title, description FROM exercises') as $data) {
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
        $this->connection->insert(
            'exercises',
            [
                'title' => $title,
                'description' => $description
            ]
        );
    }

    /**
     * @param int $id
     */
    public function destroy($id)
    {
        $this->connection->delete('exercises', ['id' => $id]);
    }

}