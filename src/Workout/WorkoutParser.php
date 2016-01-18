<?php


namespace Jehaby\Exesise\Workout;


use Jehaby\Exesise\Workout;

interface WorkoutParser
{

    /**
     * @param string $data
     * @return Workout
     */
    public function parse($data);



}