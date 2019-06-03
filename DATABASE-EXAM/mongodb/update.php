<?php
require_once __DIR__.'/connect.php';
try{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $date = $_POST['date'];


    $collectionUpcomingSneakers->updateOne(['_id'=>new MongoDB\BSON\ObjectID($id)],
    ['$set'=>[
        'name'=>$name,
        'brand'=>$brand,
        'description'=>$description,
        'price'=>$price,
        'image'=>$image,
        'date'=>$date]
    ]);

    echo '{"status":1, "message":"success"}';
}catch(MongoException $ex){
    echo '{"status":0, "message":"error"}';
}
