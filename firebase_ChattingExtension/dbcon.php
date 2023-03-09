<?php

require __DIR__.'/vendor/autoload.php';

use Kreait\Firebase\Factory;

$factory = (new Factory)
    ->withServiceAccount('CaffeineEmporium_AdminKey.json')
    ->withDatabaseUri('https://caffeineemporium-342a9-default-rtdb.firebaseio.com/');
     
$database = $factory->createDatabase();

?>