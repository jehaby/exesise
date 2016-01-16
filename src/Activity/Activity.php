<?php

namespace Jehaby\Exesise;

use Jehaby\Exesise\Exercise;


abstract class  Activity {

    /**
     * @var
     */
    private $exercise;


    private $type;

    abstract public function start();

    abstract public function stop();

    abstract public function pause();

}

