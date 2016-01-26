<?php


$injector = new \Auryn\Injector;


//$config = new \Doctrine\DBAL\Configuration();


$connectionParams = [
    'driver' => 'pdo_sqlite',
    'path' =>  \Jehaby\Exesise\Config::getDir() . '/storage/database.sqlite',
];
$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

$injector->share($conn);
//$injector->alias(\Doctrine\DBAL\Driver\Connection::class, $conn);

$injector->alias(\Symfony\Component\Console\Output\OutputInterface::class, \Symfony\Component\Console\Output\ConsoleOutput::class);

$injector->define(\Monolog\Logger::class, [
    'defaultLogger',
    [new \Monolog\Handler\StreamHandler('storage/default.log')]
]);
$injector->alias(\Psr\Log\LoggerInterface::class, \Monolog\Logger::class);
$injector->share(\Monolog\Logger::class);


