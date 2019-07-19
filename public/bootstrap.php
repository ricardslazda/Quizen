<?php


namespace Quiz\views;

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => DRIVER,
    'host'      => HOST,
    'database'  => DATABASE,
    'username'  => USERNAME,
    'password'  => PASSWORD,
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();