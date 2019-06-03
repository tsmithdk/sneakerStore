<?php
try {
require 'vendor/autoload.php'; // include Composer's autoloader

$client = new MongoDB\Client;
$collectionUpcomingSneakers = $client->sneakerStore->upcoming_sneakers;
 //$response = $collectionUpcomingSneakers->find([]);
 //$aUpcomingSneakers = json_encode(iterator_to_array($response, true), true);
 //echo $aUpcomingSneakers;
} catch (\Throwable $th) {
print_r($th);
//throw $th;
}
?>
