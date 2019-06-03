<?php
ini_set('display_errors', 1);
require_once __DIR__.'/../mongo-database.php';
try{


    $collectionUpcomingSneakers->insertOne([
    'name' => $_POST['txtName'],
    'brand' => $_POST['txtBrand'],
    'description' => $_POST['txtDescription'],
    'price' => $_POST['txtPrice'],
    'image' => $_POST['txtImage'],
    'date' => $_POST['txtDate']

    ]);


    echo '{"status":1, "message":"success"}';
}catch(MongoException $ex){
    echo '{"status":0, "message":"error"}';
}