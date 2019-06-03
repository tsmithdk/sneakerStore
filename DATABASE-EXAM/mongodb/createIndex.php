<?php
ini_set('display_errors', 1);
require_once __DIR__.'/connect.php';
try{

/*********************** CREATE INDEX **************************/
     $ajSneakers = $collectionUpcomingSneakers->createIndex(["brand"=>1]);

    /*********************** CREATE UNIQUE INDEX **************************/
   /*  $ajSneakers = $collectionUpcomingSneakers->createIndex(["brand"=>1],['unique'=>true]);*/

    var_dump($ajSneakers);

    //echo  json_encode(iterator_to_array( $ajSneakers, true), true);

    echo '{"status":1, "message":"success"}';
}catch(MongoException $ex){
    echo '{"status":0, "message":"error"}';
}

