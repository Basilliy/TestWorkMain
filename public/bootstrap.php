<?php

include (__ROOT__.'/vendor/autoload.php');

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule;
$capsule->addConnection([
    "driver"    => "mysql",
    "host"      => "my_project_db",
    "database"  => "my_project_db",
    "username"  => "my_project",
    "password"  => "russik",
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();