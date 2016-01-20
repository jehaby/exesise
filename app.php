#!/usr/bin/php
<?php


require 'src/bootstrap.php';


$pdo = new \Aura\Sql\ExtendedPdo('sqlite:storage/database.sqlite');



//$r = new \Jehaby\Exesise\Repositories\ExercisesRepository($injector->make(\Aura\Sql\ExtendedPdo::class));

$r = new \Jehaby\Exesise\Repositories\ExercisesRepository($pdo);

var_dump($r->getAllExercises());








die();


$app = new \Symfony\Component\Console\Application();
$app->add(new \Jehaby\Exesise\Commands\Test());
$app->add($injector->make(\Jehaby\Exesise\Commands\ListExercises::class));
$app->run();


