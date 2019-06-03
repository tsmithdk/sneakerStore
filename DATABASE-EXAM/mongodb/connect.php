<?php
try {
require 'vendor/autoload.php'; 

$client = new MongoDB\Client;
$collectionUpcomingSneakers = $client->sneakerStore->upcoming_sneakers;

} catch(MongoException $e){
    echo "Exception:".$e->getMessage()."";
    exit;
}
?>

