#!/usr/bin/php
<?php

require 'src/bootstrap.php';

$app = new \Symfony\Component\Console\Application();

$commands = [
    \Jehaby\Exesise\Commands\Test::class,
    \Jehaby\Exesise\Commands\ListExercises::class,
    \Jehaby\Exesise\Commands\AddExercise::class,
    \Jehaby\Exesise\Commands\RemoveExercise::class,
    \Jehaby\Exesise\Commands\RunWorkout::class
];

foreach ($commands as $command) {
    $app->add($injector->make($command));
}

$app->run();


