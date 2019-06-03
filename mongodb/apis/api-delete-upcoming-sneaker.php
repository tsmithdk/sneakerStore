<?php
ini_set('display_errors', 1);
require_once __DIR__.'/../mongo-database.php';

try{
$id = $_POST['id'];

$collectionUpcomingSneakers->deleteOne(['_id'=>new MongoDB\BSON\ObjectID($id)]);

    echo '{"status":1, "message":"user deleted"}';
}catch(MongoException $ex){
    echo '{"status":0, "message":"error"}';
}
 