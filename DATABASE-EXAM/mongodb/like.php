<?php
ini_set('display_errors', 1);
require_once __DIR__.'/connect.php';
try{

    $sInputSearch = "u";
    // FOR CASE INSENSITIVE
    $regex = new MongoDB\BSON\Regex("$sInputSearch","i");

    $ajSneakers = $collectionUpcomingSneakers->find(['$or'=>[
                                                        ['brand'=> $regex],
                                                        ['name'=> $regex]
                                                    ]

    ], ['sort'=>['_id'=> -1]]);

    echo  json_encode(iterator_to_array( $ajSneakers, true), true);

    echo '{"status":1, "message":"success"}';
}catch(MongoException $ex){
    echo '{"status":0, "message":"error"}';
}

