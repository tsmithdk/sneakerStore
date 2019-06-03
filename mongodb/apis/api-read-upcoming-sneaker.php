<?php

ini_set('display_errors', 1);
require_once __DIR__.'/../mongo-database.php';
try{
    $ajSneakers = $collectionUpcomingSneakers->find([], ['sort'=>['_id'=> -1]]);
    $aSneakers = json_encode(iterator_to_array($ajSneakers, true), true);
    
   echo $aSneakers;
}catch(MongoException $e ){
    echo "error message to create: " .$e->getMessage()."\n";
    exit;
}

