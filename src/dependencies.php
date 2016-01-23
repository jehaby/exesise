<?php


$injector = new \Auryn\Injector;

$injector->define(\Aura\Sql\ExtendedPdo::class, ['sqlite:storage/database.sqlite']);
$injector->alias(\Aura\Sql\ExtendedPdoInterface::class, \Aura\Sql\ExtendedPdo::class);
$injector->share(\Aura\Sql\ExtendedPdo::class);

